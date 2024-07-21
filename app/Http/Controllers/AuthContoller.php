<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{

    private $resources = [];
    private $prefix = '/';
    private $authSrvice;
    private $userService;
    public function __construct(
        AuthService $authSrvice,
        UserService $userService
    ) {
        $this->authSrvice = $authSrvice;
        $this->resources['prefix'] = $this->prefix;
        $this->userService = $userService;
    }
    public function index(): mixed
    {
        if (Auth::check()) {
            return redirect()->intended('admin/dashboard')->with($this->resources);
        }
        return view('login')->with($this->resources);
    }
    public function authenticate(Request $request): mixed
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:6'],
        ]);

        try {
            $remember = $request->remember_me;
            $credentials = [
                "email" => $request->email,
                "password" => $request->password,
                "status" => 1
            ];

            if ($this->authSrvice->authenticate($request, $credentials, $remember)) {

                // $user = $this->userService->getByNid($request->nid);
                // if ($user['number_verified_at'] == null) {e
                //     Auth::logout();
                //     return redirect()->route('mobile.verify.index', ['nid' => $request->nid]);
                // }
                return redirect()->intended('dashboard')->with($this->resources);
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records or Your account is inactive.!',
            ])->onlyInput('email');
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function logout(Request $request): mixed
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
