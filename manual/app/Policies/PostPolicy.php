<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;

class PostPolicy
{

    public function before(User $user)
    {
        if ($user->role_id === Role::IS_ADMIN) {
            return true;
        }
    }

    public function viewAny()
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {   
        return $user->role_id == Role::IS_WRITER;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->role_id === Role::IS_WRITER && $user->id == $post->user_id; 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->role_id === Role::IS_WRITER && $user->id == $post->user_id; 
    }
   
}
