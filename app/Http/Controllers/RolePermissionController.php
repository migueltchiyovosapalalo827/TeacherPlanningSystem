<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
   /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Role $role): RedirectResponse
    {
        $data = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' =>
                'sometimes|string|exists:\Spatie\Permission\Models\Permission,name',
        ]);

        $role->syncPermissions($data['permissions']);

        return redirect()
            ->back(fallback: route('roles.edit', $role))
            ->with('success', 'Role permissions updated successfully.');
    }
}
