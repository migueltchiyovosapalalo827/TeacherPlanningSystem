<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $roles = Role::all();

        return view('roles.index', [
            'roles' => $roles,
        ]);
    }


   /**
 * Show the form for creating a new resource.
 *
 * @return Renderable
 */
public function create(): Renderable
{
    return view('roles.create');
}


   /**
 * Store a newly created resource in storage.
 *
 * @param StoreRoleRequest $request
 * @return RedirectResponse
 */
public function store(StoreRoleRequest $request): RedirectResponse
{
    Role::create($request->validated());

    return redirect()
        ->route('roles.index')
        ->with('success', 'Role created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

 /**
 * Show the form for editing the specified resource.
 *
 * @param Role $role
 * @return Renderable
 */
public function edit(Role $role): Renderable
{
    $permissions = Permission::all();

    return view('roles.edit', [
        'role' => $role,
        'permissions' => $permissions,
    ]);;
}


/**
 * Update the specified resource in storage.
 *
 * @param UpdateRoleRequest $request
 * @param Role $role
 * @return RedirectResponse
 */
public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
{
    $role->update($request->validated());

    return redirect()
        ->route('roles.index')
        ->with('success', 'Role updated successfully.');
}


 /**
 * Remove the specified resource from storage.
 *
 * @param Role $role
 * @return RedirectResponse
 */
public function destroy(Role $role): RedirectResponse
{
    $role->delete();

    return redirect()
        ->route('roles.index')
        ->with('success', 'Role deleted successfully.');
}

}
