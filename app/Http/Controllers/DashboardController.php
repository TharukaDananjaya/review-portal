<?php

namespace App\Http\Controllers;

use App\Services\AnalyticService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $resources = [];
    private $prefix = '/admin';
    public function __construct()
    {
        $this->resources['prefix'] = $this->prefix;
    }
    public function index(): \Illuminate\View\View
    {
        if(Auth::user()->type == 1){
            return view('admin.dashboard')->with($this->resources);
        }else{
            return view('user.dashboard')->with($this->resources);
        }
        
    }
}
