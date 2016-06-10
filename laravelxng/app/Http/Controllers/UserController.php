<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Flash;
use App\User;
use Mail;
use Config;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getDashboard()
    {
    	$user = Auth::user();

        if(empty($user->activated_at)){
            Flash::error('<h5>
                    Your email account is not yet verified. There are <strong>action items</strong> you will not be able to take until your email is verified. Please check your email for a Email Verification from '.Config::get('settings.sitename').'.
                    <div>
                        <a class="btn btn-blue margin-top-10" href="'.url('user/resendverification').'">Resend Verification Email</a>
                    </div>
                </h5>');
        }

    	return view('users/dashboard')
    	->with('user', $user);
    }

    public function getVerify($user_id, $activation_code)
    {
    	if ($user_id != Auth::id()) {
			return redirect('/logout');
		}

		$user = User::where('id', '=', Auth::id())
			->where('activation_code', '=', $activation_code)
			->whereNull('activated_at')
			->first();

		if (!$user) {
			return redirect('/logout');
		}

		$user->activated_at = date('Y-m-d H:i:s');
		$user->save();

		Flash::success('Your email address has been verified.');

		return redirect('user/dashboard');
    }

    public function getResendverification()
    {
    	$user = Auth::user();

    	Mail::send('emails/user/verify', array('user' => $user), function($message) use ($user)
        {
         $message->to($user->email)
             ->bcc(Config::get('settings.archive_email'))
             ->subject('Welcome to '.Config::get('settings.sitename').'!');
        });

    	Flash::success('A new verification email has been sent to '.$user->email.'... Please go check your email.');

    	return back();
    }

}
