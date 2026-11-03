<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!in_array((int) $user->role_id, [1, 3], true)) {
            return response()->json([
                'message' => 'This account does not have access to the admin application.',
            ], 403);
        }

        $token = $user->createToken('vue-admin', ['*'], now()->addDays(30));

        return response()->json([
            'success' => true,
            'token' => $token->plainTextToken,
            'user' => $this->userPayload($user),
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        abort_unless(in_array((int) $request->user()->role_id, [1, 3], true), 403);

        return response()->json([
            'success' => true,
            'user' => $this->userPayload($request->user()),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'success' => true,
            'message' => 'Signed out successfully.',
        ]);
    }

    public function profile(Request $request): JsonResponse
    {
        $user = $request->user()->load(['role:id,name', 'vendors:id,user_id,shop_name,slug,status']);

        return response()->json([
            'success' => true,
            'user' => $this->userPayload($user),
        ]);
    }

    /**
     * Product form lookup values are read-only and intentionally exclude vendor
     * records other than the authenticated vendor's own shop.
     *
     * @return array<string, mixed>
     */
    private function userPayload(User $user): array
    {
        $user->loadMissing(['role:id,name', 'vendors:id,user_id,shop_name,slug,status']);

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role_id' => (int) $user->role_id,
            'role' => $user->role?->name,
            'vendors' => $user->vendors->map(fn ($vendor) => [
                'id' => $vendor->id,
                'shop_name' => $vendor->shop_name,
                'slug' => $vendor->slug,
                'status' => $vendor->status->value ?? $vendor->status,
            ])->values(),
        ];
    }

    public function productFormOptions(Request $request): JsonResponse
    {
        $user = $request->user();
        $vendors = (int) $user->role_id === 1
            ? \App\Models\Vendor::query()->select('id', 'shop_name')->orderBy('shop_name')->get()
            : $user->vendors()->select('id', 'shop_name')->orderBy('shop_name')->get();

        return response()->json([
            'success' => true,
            'vendors' => $vendors,
            'categories' => \App\Models\Category::query()->select('id', 'name')->orderBy('name')->get(),
            'brands' => \App\Models\Brand::query()->select('id', 'name')->orderBy('name')->get(),
        ]);
    }
}
