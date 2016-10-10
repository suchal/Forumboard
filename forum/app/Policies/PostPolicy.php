<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Post $post){
        return ($user->owns($post) && $post->is_open);
    }

    public function comment(User $user, Post $post){
        return ($post->is_open && $post->reply_allowed);
    }
    

}
