<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role:id,name')
            ->whereHas('role', fn ($query) => $query->whereNotIn('name', ['Vendor', 'Customer']))
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

    public function destroy(User $user)
    {
        if ($user->id === auth()->id() || $user->role?->name === 'Vendor' || $user->role?->name === 'Customer') {
            return response()->json([
                'success' => false,
                'message' => 'This user cannot be deleted from the staff list.',
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
}
