<?php

namespace App\Http\Controllers;

use App\Services\NidService;
use App\Services\SmsService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $resources = [];
    private $prefix = '/register';
    private $userService;
    private $smsService;
    private $nidService;
    public function __construct(UserService $userService, SmsService $smsService, NidService $nidService)
    {
        $this->resources['prefix'] = $this->prefix;
        $this->userService = $userService;
        $this->smsService = $smsService;
        $this->nidService = $nidService;
    }
    public function index(): \Illuminate\View\View
    {
        return view('register')->with($this->resources);
    }
    public function mobileVerify(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'nid' => ['required', 'min:7', 'max:7'],
        ]);
        $this->resources['nid'] = $request->nid;
        return view('mobile_verify')->with($this->resources);
    }
    public function store(Request $request): string
    {
        $request->validate([
            'name' => ['required'],
            'nid' => ['required', 'unique:users', 'min:7', 'max:7', 'exists:nids,nid'],
            'mobile_number' => ['required', 'min:10', 'max:10', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'required_with:password_confirmation', 'same:password_confirmation', 'min:6'],
            'password_confirmation' => ['required', 'min:6']
        ]);
        try {
            // $token = $this->smsService->requestToken();
            // if(!$this->validateMaldivesPhoneNumber($request->mobile_number)){
            //     $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Invalid Numbe!. number structure should be 9601234567");
            //     return redirect()->back()->with('messages', $this->resources);
            // }
            $otp = $this->smsService->generateOTP();
            $sendMessage = $this->smsService->sendMessage($request->mobile_number, $otp);
            $this->userService->store([
                'name' => $request->name,
                'nid' => $request->nid,
                'password' => Hash::make($request->password),
                'mobile_number' => $request->mobile_number,
                'otp' => $otp,
                'number_verified_at' =>  NULL,
                'email' => $request->email,
                'type' => 3,
                'status' => 1
            ]);
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "An SMS containing a six-digit verification code has been sent to your mobile number. Please enter the code below to proceed.");
            return redirect()->route('mobile.verify.index', ['nid' => $request->nid])->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    public function verify(Request $request): string
    {
        $request->validate([
            'otp' => ['required', 'min:6', 'max:6'],
            'nid' => ['required', 'min:7', 'max:7'],
        ]);
        try {
            $requestAll = $request->all();
            $nid = $this->nidService->getByNid($requestAll['nid']);
            if ($nid) {
                $user = $this->userService->getByNid($requestAll['nid']);
                if ($user && $user['nid'] == $requestAll['nid']) {
                    if ($requestAll['otp'] === $user['otp']) {
                        $this->userService->updateByNid([
                            'number_verified_at' =>  now(),
                        ], $requestAll['nid']);
                        $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Mobile number verified successfully. please login");
                        return redirect()->route('login.index')->with('messages', $this->resources);
                    } else {
                        $this->resources['messages'] = array("type" => "error", "heading" => "Invalid", "description" => "OTP not valid. try again");
                        return redirect()->back()->with('messages', $this->resources);
                    }
                }
            }
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong. try again.");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    // Function to validate Maldives phone number
    function validateMaldivesPhoneNumber($phone)
    {
        // Define the regular expression pattern
        $pattern = '/^\960\d{7}$/'; // Matches +960 followed by 7 digits

        // Perform the regular expression match
        if (preg_match($pattern, $phone)) {
            return true; // Phone number is valid
        } else {
            return false; // Phone number is not valid
        }
    }
}
