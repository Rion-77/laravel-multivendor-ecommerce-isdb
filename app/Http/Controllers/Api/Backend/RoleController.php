<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')->orderBy('name')->paginate(15);

        return response()->json([
            'success' => true,
            'roles' => $roles,
        ]);
    }

    public function destroy(Role $role)
    {
        if ($role->id === 1 || $role->users()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This role cannot be deleted while it is assigned to users or is the administrator role.',
            ], 409);
        }

        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully.',
        ]);
    }
}
