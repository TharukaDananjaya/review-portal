<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private $resources = [];
    private $prefix = '/admin/users';
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->resources['prefix'] = $this->prefix;
        $this->userService = $userService;
    }
    public function index(): \Illuminate\View\View
    {
        $this->resources['data'] = $this->userService->getById(Auth::user()->id);
        return view('user.profile')->with($this->resources);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);
        if ($request->password != "") {

            $credentials = $request->validate([
                'password' => ['required', 'required_with:password_confirmation', 'same:password_confirmation', 'min:6'],
                'password_confirmation' => ['required', 'min:6']
            ]);
            $this->userService->update([
                'password' => Hash::make($request->password),
            ], $request->id);
        }


        try {
            $user = auth()->user();

            // Delete old profile photo if it exists
           
            if ($request->has('photo') && is_file($request->photo)) {
                if ($user->photo) {
                    Storage::delete('public/profiles/' . $user->photo);
                }
                // Store new profile photo
                $path = $request->file('photo')->store('public/profiles');

                // Update user's profile photo path in the database
                $photo = basename($path);
                $this->userService->update([
                    'photo' => $photo
                ], Auth::user()->id);
            }

            $this->userService->update([
                'name' => $request->name,
                'email' => $request->email,
            ], Auth::user()->id);

            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Profile updated success!");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
}
