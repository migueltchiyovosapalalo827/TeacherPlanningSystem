<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Discipline;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request): View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create(Request $request): View
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {

        $user = User::create($request->validated());
        return redirect()->route('user.index')->with('success', 'usuario cadastrado com sucesso');
    }

    public function show(Request $request, User $user): View
    {
        $disciplines = Discipline::all();
        return view('user.show', compact('user','disciplines'));
    }

    public function edit(Request $request, User $user): View
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('user.edit', [
            'user' => $user,
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('user.index')->with('success', 'usuario actualizado com sucesso');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index');
    }

    public function storeAssignedDisciplines(Request $request, User $user)
    {
        $disciplines = $request->input('disciplines');

        $user->disciplines()->sync($disciplines);

        return redirect()->route('professors.index')->with('success', 'Disciplinas atribuídas ao professor com sucesso.');
    }
} 
