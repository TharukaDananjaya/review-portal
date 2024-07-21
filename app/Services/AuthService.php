<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * @param object $request
     * @param array $credentials
     * @param boolean $remember
     * @return boolean
     */
    public function authenticate($request, $credentials, $remember): bool
    {
        try {
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
