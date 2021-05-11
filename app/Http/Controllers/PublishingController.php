<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishing;

class PublishingController extends Controller
{
    function index()
    {
    	return view('book');
    }
    function add(Request $request)
    {
        $this->validate($request, array(
            'id' => 'required|alphaNum|max:3',
            'name' => 'required|max:100',
        ));

        Publishing::create(array(
            'id' => $request->input('id'),
            'name' => $request->input('name'),
        ));
        return redirect()->back();
    }
}