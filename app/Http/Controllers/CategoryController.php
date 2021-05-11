<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
    	return view('book');
    }
    function add(Request $request)
    {
        $this->validate($request, array(
            'id' => 'required|alphaNum|max:3',
            'category' => 'required|max:40',
        ));

        Category::create(array(
            'id' => $request->input('id'),
            'category' => $request->input('category'),
        ));
        return redirect()->back();
    }
}