<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use DB;
class SearchEngine extends Controller
{
    function index()
    {
    	return view('book');
    }

    function allBooksWithCategories()
    {
    	$book = Book::all();
        $category = Category::all();
    	return view('book', compact('book','category'));
    }

    function findBook()
    {
    	$category = Category::all();
    	$book = Book::where('title','like', '%' . request('bookTitle') . '%')->get();
        return view('book')->with('book', $book)->with('title', 'Result: '. request('bookTitle'))->with('category', $category);
    }

}
