<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function index()
    {
    	return view('login');
    }

    function checklogin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|alphaNum|min:3'
    	]);
    	$user_data = array(
    		'email' => $request->get('email'),
    		'password' => $request->get('password')
    	);

    	if(Auth::attempt($user_data))
    	{
    		return view('index');
    	}
    	else
    	{
    		return view('login')->with('error', 'bledny email lub haslo');
    	}
    }

    function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }
}

