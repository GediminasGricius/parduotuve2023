<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicies
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function adminActions(User $user){
        return ($user->admin==1 );
    }
}
