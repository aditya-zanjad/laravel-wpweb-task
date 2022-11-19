<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ViewOrStoreTaskPolicy
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

    /**
     * Authorization for store tasks method
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function viewOrStore(User $user)
    {
        return $user->userType->id === 2
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
