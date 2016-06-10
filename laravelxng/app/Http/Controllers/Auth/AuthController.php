<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Config;
use Flash;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Allow login with username instead of email.
     *
     * @var string
     */
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required|max:255',
            'suffix' => 'max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip' => 'required|max:255',
            'terms' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'name' => $data['firstname'].' '.$data['lastname'],
            'suffix' => $data['suffix'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'activation_code' => str_random(30),
            'avatar' => url('/assets/images/user.jpg'),
        ]);

        if($data['role'] == 'Both'){
            $user->assignRole('Buyer');
            $user->assignRole('Seller');
        }else{
            $user->assignRole($data['role']); // give selected role;
        }

        Mail::send('emails/user/verify', array('user' => $user), function($message) use ($user)
        {
         $message->to($user->email)
             ->bcc(Config::get('settings.archive_email'))
             ->subject('Welcome to '.Config::get('settings.sitename').'!');
        });

        Flash::success('You have successfully signed up a '.Config::get('settings.sitename').' account!');

        return $user;
    }
}
