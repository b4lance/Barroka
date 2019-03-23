<?php

namespace App\Policies;

use App\User;
use App\Publicist;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicistPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function pass(User $user, Publicist $publicist){
            return $user->id == $publicist->user_id;
    }
}
