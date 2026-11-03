<?php

namespace App\Http\Controllers\Api\Backend;

use App\Enums\VendorStatus;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function index(): JsonResponse
    {
        $vendors = Vendor::orderBy('created_at', 'desc')
            ->with('user:id,name,email,phone')
            ->withCount('products')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'vendors' => $vendors,
        ]);
    }

    public function options(): JsonResponse
    {
        $vendorRoleIds = Role::query()
            ->whereRaw('LOWER(name) = ?', ['vendor'])
            ->select('id');

        return response()->json([
            'success' => true,
            'owners' => User::query()
                ->whereIn('role_id', $vendorRoleIds)
                ->orderBy('name')
                ->get(['id', 'name', 'email', 'phone']),
            'statuses' => array_map(fn (VendorStatus $status) => $status->value, VendorStatus::cases()),
        ]);
    }

    public function show(Vendor $vendor): JsonResponse
    {
        return response()->json([
            'success' => true,
            'vendor' => $vendor->load('user:id,name,email,phone')->loadCount('products'),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validatedVendorData($request);
        $data['slug'] = $this->uniqueVendorSlug($data['shop_name']);

        $vendor = DB::transaction(function () use ($data) {
            $owner = User::query()->findOrFail($data['user_id']);
            $this->updateOwnerProfile($owner, $data['owner']);

            $vendor = new Vendor();
            $vendor->user_id = $owner->id;
            $vendor->shop_name = $data['shop_name'];
            $vendor->slug = $data['slug'];
            $vendor->description = $data['description'];
            $vendor->commission_rate = $data['commission_rate'];
            $vendor->status = $data['status'];
            $vendor->save();

            return $vendor;
        });

        $this->saveLogo($request, $vendor);

        return response()->json([
            'success' => true,
            'vendor' => $vendor->load('user:id,name,email,phone')->loadCount('products'),
        ], 201);
    }

    public function update(Request $request, Vendor $vendor): JsonResponse
    {
        $data = $this->validatedVendorData($request, $vendor);

        DB::transaction(function () use ($data, $vendor) {
            $owner = User::query()->findOrFail($data['user_id']);
            $this->updateOwnerProfile($owner, $data['owner']);

            $vendor->user_id = $owner->id;
            $vendor->shop_name = $data['shop_name'];
            $vendor->slug = $data['slug'];
            $vendor->description = $data['description'];
            $vendor->commission_rate = $data['commission_rate'];
            $vendor->status = $data['status'];
            $vendor->save();
        });

        $this->saveLogo($request, $vendor);

        return response()->json([
            'success' => true,
            'vendor' => $vendor->load('user:id,name,email,phone')->loadCount('products'),
        ]);
    }

    public function destroy(Vendor $vendor): JsonResponse
    {
        if ($vendor->products()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Vendors with products cannot be deleted. Remove or reassign their products first.',
            ], 409);
        }

        $vendor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vendor deleted successfully.',
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedVendorData(Request $request, ?Vendor $vendor = null): array
    {
        $vendorRoleIds = Role::query()
            ->whereRaw('LOWER(name) = ?', ['vendor'])
            ->select('id');
        $ownerId = $request->input('user_id');

        $rules = [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where(fn ($query) => $query->whereIn('role_id', $vendorRoleIds)),
            ],
            'shop_name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:3', 'max:500'],
            'commission_rate' => ['required', 'numeric', 'min:0', 'max:15'],
            'status' => ['required', Rule::enum(VendorStatus::class)],
            'owner' => ['required', 'array'],
            'owner.name' => ['required', 'string', 'min:3', 'max:255'],
            'owner.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($ownerId)],
            'owner.phone' => ['required', 'string', 'phone:international', 'max:255', Rule::unique('users', 'phone')->ignore($ownerId)],
            'shop_logo' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'],
        ];

        if ($vendor) {
            $rules['slug'] = ['required', 'string', 'min:1', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('vendors', 'slug')->ignore($vendor->id)];
        }

        return $request->validate($rules);
    }

    private function uniqueVendorSlug(string $shopName): string
    {
        $baseSlug = Str::slug($shopName) ?: 'vendor';
        $slug = $baseSlug;
        $suffix = 2;

        while (Vendor::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    /**
     * @param array{name: string, email: string, phone: string} $profile
     */
    private function updateOwnerProfile(User $owner, array $profile): void
    {
        $owner->name = $profile['name'];
        $owner->email = $profile['email'];
        $owner->phone = $profile['phone'];
        $owner->save();
    }

    private function saveLogo(Request $request, Vendor $vendor): void
    {
        if ($request->hasFile('shop_logo')) {
            $vendor->addMediaFromRequest('shop_logo')->toMediaCollection('shop_logo');
        }
    }
}
