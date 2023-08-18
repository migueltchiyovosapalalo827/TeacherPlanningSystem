<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class DisciplinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all disciplines');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Discipline $discipline): bool
    {
        return $user->can('view discipline', $discipline);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create discipline');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Discipline $discipline): bool
    {
        return $user->can('update discipline', $discipline);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Discipline $discipline): bool
    {
        return $user->can('delete discipline', $discipline);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Discipline $discipline): bool
    {
        return $user->can('restore discipline', $discipline);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Discipline $discipline): bool
    {
        return $user->can('force delete discipline', $discipline);
    }
}
