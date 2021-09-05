<?php

namespace APDS\Http\Controllers\Auth;

use APDS\Http\Controllers\Controller;
use APDS\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;


    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;
            
            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
