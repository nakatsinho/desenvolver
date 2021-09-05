<?php

namespace APDS\Http\Controllers\Auth;

use APDS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $maxLoginAttempts = 2; // Amount of bad attempts user can make
    protected $lockoutTime = 300;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        $role = Auth::user();

        if($role->status_id == 1)
        {
            return ($role->role_id == '1')?'/admin':'/home';
        }
        else
        {
            return ($role->role_id == '1')?'/adminpanel':'/userpanel';
        }
    }

    public function username()
    {
        $login = request()->input('email');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'numero';
        request()->merge([$field => $login]);
        return $field;
    }

    public function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials = Arr::add($credentials, 'status_id', '1');
        return $credentials;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
