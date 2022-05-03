<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; 
use App\User;
use auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        //dd($user);
        // $user->token;
        $data=[
            'name'=>$user->getname(),
            'email'=>$user->getEmail(),
            'provider_id'=>$user->getId(),
            'image'=>$user->getAvatar(),
        ];

        $my_user = User::where('email','=', $user->getEmail())->first();
        if($my_user === null) {
            Auth::login(User::firstOrCreate($data));

        } else {
            Auth::login($my_user);
        }
        
        //Auth::Login($user,true);
        return redirect('welcome');
    }
}
