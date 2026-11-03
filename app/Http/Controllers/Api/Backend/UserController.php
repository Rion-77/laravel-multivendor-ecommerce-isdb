<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validatedUserData($request);
        $user = new User();
        $this->fillUser($user, $data);
        $user->password = $data['password'];
        $user->save();

        return response()->json([
            'success' => true,
            'user' => $user->load('role:id,name'),
        ], 201);
    }

    public function index()
    {
        $users = User::with('role:id,name')
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }

    public function customers()
    {
        $customers = User::with('role:id,name')
            ->whereHas('role', fn ($query) => $query->where('name', 'Customer'))
            ->withCount('orders')
            ->withSum('orders', 'total_amount')
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'customers' => $customers,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validatedUserData($request, $user);
        $this->fillUser($user, $data);
        if (filled($data['password'] ?? null)) {
            $user->password = $data['password'];
        }
        $user->save();

        return response()->json([
            'success' => true,
            'user' => $user->load('role:id,name'),
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete your own account.',
            ], 409);
        }

        if ($user->orders()->exists() || $user->vendors()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Users connected to orders or vendors cannot be deleted.',
            ], 409);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.',
        ]);
    }

    public function destroyCustomer(User $customer)
    {
        abort_unless($customer->role?->name === 'Customer', 404);

        if ($customer->orders()->exists() || $customer->vendors()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Customers connected to orders or vendors cannot be deleted.',
            ], 409);
        }

        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer deleted successfully.',
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedUserData(Request $request, ?User $user = null): array
    {
        $isSelf = $user?->is($request->user()) ?? false;

        return $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'role_id' => [
                'required',
                'integer',
                Rule::exists(Role::class, 'id'),
                ...($isSelf ? [Rule::in([$user->role_id])] : []),
            ],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user?->id)],
            'phone' => ['required', 'string', 'phone:international', 'max:255', Rule::unique('users', 'phone')->ignore($user?->id)],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * @param array<string, mixed> $data
     */
    private function fillUser(User $user, array $data): void
    {
        foreach (['name', 'role_id', 'email', 'phone'] as $field) {
            $user->{$field} = $data[$field];
        }
    }
}
