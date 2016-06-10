<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Testimonial;
use Flash;
use App\User;

class SiteController extends Controller
{
	public function __construct()
	{
        // https://github.com/elastic/elasticsearch/tree/master/docs/java-api
        // Check out Elastic Search for website searching.
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
       return redirect('/home');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        return view('site/home');
    }

    public function getSandbox()
    {
        $user = User::where('firstname', 'Jay')->first();

        return view('emails/user/verify')
        ->with('user', $user);
    }


}
