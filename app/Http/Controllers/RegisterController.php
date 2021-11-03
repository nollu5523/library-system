<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index()
    {
        return view('register');
    }

    function register(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|alpha_dash|max:40',
            'surname' => 'required|alpha_dash|max:40',
            'email' => 'required|unique:users|email|max:100',
            'password' => 'required|confirmed|min:4',
        ));

        User::create(array(
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ));

        return redirect('register')->with('info','Konto zostało utworzone pomyślnie');

    }
}

