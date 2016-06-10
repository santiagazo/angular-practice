<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Socialite;
use App\User;
use Config;
use Flash;
use Auth;
use Mail;
use Illuminate\Support\Facades\Input;



class SDKAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function getRedirect($socialMediaOutlet)
    {
        return Socialite::driver($socialMediaOutlet)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function getCallback(Request $request, $socialMediaOutlet)
    {
        $user = Socialite::driver($socialMediaOutlet)->user();

        if(empty($user->getEmail())){
        	Flash::error('Hmmm. Unfortunately your '.$socialMediaOutlet.' account does not have an email associated with the account. If you would like to use '.$socialMediaOutlet.' please go and add an email to your account profile. Otherwise, please user a different social media account or create a new account below with '.Config::get('settings.sitename').'.');

        	return view('auth.login');
        }

        $userArray = [
        	'social_media_outlet' => $socialMediaOutlet,
        	'social_id' => $user->getId(),
        	'nickname' => $user->getNickname(),
        	'name' => $user->getName(),
        	'email' => $user->getEmail(),
        	'avatar' => $user->getAvatar(),
        	'activation_code' => str_random(30)
        ];

        $currentUser = User::where('social_id', $userArray['social_id'])->where('email', $userArray['email'])->first();
        $currentEmail = User::where('email', $userArray['email'])->first();

        if(empty($currentUser) && $currentEmail){

            $registeredAccount = $currentEmail->social_media_outlet ?: Config::get('settings.sitename');

            Flash::error('The email associated with your '.$socialMediaOutlet.' account is already a registered email with '.Config::get('settings.sitename').'. This means you have either logged in with a different social media account or you created your own username and password for '.Config::get('settings.sitename').'. Our records show you logged in with a '.$registeredAccount.' account.');

            return view('auth.login');
        }

        if(empty($currentUser)){
	        $currentUser = User::create($userArray);

            Mail::send('emails/user/verify', array('user' => $currentUser), function($message) use ($userArray)
            {
             $message->to($userArray['email'])
                 ->bcc(Config::get('settings.archive_email'))
                 ->subject('Welcome to '.Config::get('settings.sitename').'!');
            });
        }

        Auth::login($currentUser);



        return redirect('user/dashboard');

    }
}
