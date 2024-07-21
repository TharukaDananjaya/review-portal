<?php

namespace App\Http\Controllers;

use App\Mail\InviteMail;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
        $this->resources['data'] = $this->userService->getAll();
        return view('admin.users.manage')->with($this->resources);
    }
    
    public function create(): \Illuminate\View\View
    {
        return view('admin.users.add')->with($this->resources);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'required_with:password_confirmation', 'same:password_confirmation', 'min:6'],
            'password_confirmation' => ['required', 'min:6']
        ]);
        try {
            $this->userService->store([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
                'status' => $request->status
            ]);

            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "User creation success!");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    public function edit(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();
        $this->resources['data'] = $this->userService->getById($requestAll['id']);
        return view('admin.users.edit')->with($this->resources);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($request->id)],
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
            $this->userService->update([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'status' => $request->status
            ], $request->id);
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "User updated success!");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }

    public function delete(Request $request): mixed
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();
        if ($requestAll['id'] == (int) 1) {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "You cannot delete this user!.");
        }
        $delete = $this->userService->delete($requestAll['id']);
        if ($delete) {
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "User deleting successfully completed!.");
        } else {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "User deleting failed try again!.");
        }

        return redirect()->back()->with('messages', $this->resources);
    }
    
}
