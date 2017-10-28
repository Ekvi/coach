<?php

namespace App\Http\Guards;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class TokenGuard extends \Illuminate\Auth\TokenGuard
{
    public function __construct(UserProvider $provider, Request $request)
    {
        parent::__construct($provider, $request);
        $this->inputKey = 'accessToken';
        $this->storageKey = 'accessToken';
    }
}