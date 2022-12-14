<?php

namespace App\Policies;

use App\Models\User;
use App\Models\project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\project  $project
     * @return mixed
     */
    public function view(User $user, project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\project  $project
     * @return mixed
     */
    public function update(User $user, project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\project  $project
     * @return mixed
     */
    public function delete(User $user, project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\project  $project
     * @return mixed
     */
    public function restore(User $user, project $project)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\project  $project
     * @return mixed
     */
    public function forceDelete(User $user, project $project)
    {
        //
    }

    public function upload(User $user, project $project){
        return $user->id === $project->user_id;
    }
}
