<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;
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
        $author = Author::all();
    	return view('book', compact('book','category','author'));
    }

    function findBook()
    {
    	$category = Category::all();
        $book = DB::table('books')->select('books.id','books.title','authors.id','authors.surname')->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where( function ($query) {
            $query->where('title','like','%' . request('bookTitle') . '%')->groupBy('authors_books','id');
    })->get();
        $author = DB::table('authors')->where('name', 'like' , '%' . request('bookTitle') . '%')->orWhere('surname','like','%' . request('bookTitle') . '%')->get();
        return view('book', compact('book','category','author'));
    }

    function categoryFilter(Request $request)
    {
        
        $requestCategory = $request->input('category');
        $category = Category::all();

        $book = DB::table('books')->select('books.title','books.id')->join('categories','categories.id','=','books.category_id')->where('categories.id','=', $requestCategory)->get();

        $author = DB::table('authors')->select('authors.name','authors.surname','authors.id')->join('authors_books', 'authors_books.author_id','=','authors.id')->join('books','books.id','=','authors_books.book_id')->join('categories','categories.id','=','books.category_id')->where('categories.id','=', $requestCategory)->get();

        return view('book', compact('book','category','author'));

    }

    function authorAllBooks()
    {
        $category = Category::all();
        $author = DB::table('authors')->select('authors.name','authors.surname')->where('authors.surname', 'like' , request('author'))->get();

        $authorID = DB::table('authors')->select('id')->where('surname','like', request('author'))->get();

        $book = DB::table('books')->select('title')->join('authors_books','books.id','=','authors_books.book_id')->join('authors','authors.id','=','authors_books.author_id')->where('authors.surname','like', request('author'))->get();

        return view('author', compact('author','book','category'));
    }

}
