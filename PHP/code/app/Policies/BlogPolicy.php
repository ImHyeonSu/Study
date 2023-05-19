<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{#説明ーblogに関したpolicy
    use HandlesAuthorization;

    /**
     * BlogController.index
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * BlogController.show
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blog $blog): bool
    {
        return true;
    }

    /**
     * BlogController.create or store
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * BlogController.edit or update
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool
    {
        return $user->id === $blog->user_id;
    }

    /**
     * BlogController.destroy
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): bool
    {
        return $user->id === $blog->user_id;
    }
}
