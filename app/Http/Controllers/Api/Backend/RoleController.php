<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validatedRoleData($request);
        $role = new Role();
        $role->name = $data['name'];
        $role->save();

        return response()->json([
            'success' => true,
            'role' => $role->loadCount('users'),
        ], 201);
    }

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

    public function update(Request $request, Role $role)
    {
        if ($role->id === 1 || in_array(strtolower($role->name), ['vendor', 'customer'], true)) {
            return response()->json([
                'success' => false,
                'message' => 'Built-in administrator, vendor, and customer roles cannot be edited.',
            ], 409);
        }

        $data = $this->validatedRoleData($request, $role);
        $role->name = $data['name'];
        $role->save();

        return response()->json([
            'success' => true,
            'role' => $role->loadCount('users'),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedRoleData(Request $request, ?Role $role = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                Rule::unique('roles', 'name')->ignore($role?->id),
                'not_regex:/^(admin|vendor|customer)$/i',
            ],
        ]);
    }
}
