<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    function index()
    {
    	$author = Author::all();
    	return view('authorAdd', compact('author'));
    }
    function add(Request $request)
    {

    	$this->validate($request, array(
    		'name' => 'required|alphaNum|max:40',
    		'surname' => 'required|alphaNum|max:40',
    	));

    	Author::create(array(
    		'name' => $request->input('name'),
    		'surname' => $request->input('surname'),
    	));
        $author = Author::all();
    	return view('authorAdd',compact('author'))->with('info','Pomyślnie dodano autora');
    }
    function delete($id)
    {
    	$author = Author::where('id',$id);
    	$author->delete();
        $author = Author::all();
    	return view('authorAdd',compact('author'))->with('info','Pomyślnie usunięto autora');
    }
    function edit($id)
    {
    	$edit = Author::where('id',$id)->first();
    	return view('editAuthor',compact('edit'));
    }
    function update(Request $request)
    {
    	$author = Author::where('id',$request->id)->first();
    	$author->name = $request->name;
    	$author->surname = $request->surname;
    	$author->save();
        $author = Author::all();
    	return view('authorAdd',compact('author'))->with('info','Pomyślnie zaktualizowano autora');
    }
}

