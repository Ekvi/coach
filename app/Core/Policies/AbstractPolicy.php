<?php

namespace App\Core\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

abstract class AbstractPolicy
{
    use HandlesAuthorization;

    public function hasAccess()
    {
        return Auth::user()->hasAccessToAdminPanel();
    }
}