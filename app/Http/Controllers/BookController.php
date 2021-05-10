<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
	function index()
    {
    	return view('bookAdd');
    }
    function add(Request $request)
    {
        $this->validate($request, array(
            'isbn' => 'required|max:40',
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'category_id' => 'required|alphaNum|max:40',
    		'publishing_id' => 'required|alphaNum|max:40',
        ));

        Book::create(array(
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'publishing_id' => $request->input('publishing_id'),
        ));
        return view('bookAdd')->with('info', 'Dodano pomyślnie książkę');
    }
}
