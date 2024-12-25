<?php


namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        // Allow the user to update their own posts
        return $user->id === $post->user_id || $user->hasRole('admin');;
    }

    public function delete(User $user, Post $post)
    {
        // Allow the user to delete their own posts, or allow admins to delete any post
        return $user->id === $post->user_id || $user->hasRole('admin');
    }
}
