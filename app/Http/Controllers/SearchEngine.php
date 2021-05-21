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
        $book = Book::all();
        $category = Category::all();
        $author = Author::all();
    	return view('book',compact('book','category','author'));
    }

    function allBooksWithCategories()
    {
    	$book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn','authors.name','authors.id','authors.surname')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors.id','=','authors_books.author_id')->orderBy('books.title','asc')->get();
        $category = Category::all();
        $author = Author::all();
    	return view('book', compact('book','category','author'));
    }

    function findBook()
    {
    	$category = Category::all();
        $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn','authors.name','authors.id','authors.surname')->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where( function ($query) {
            $query->where('title','like','%' . request('bookTitle') . '%')->groupBy('authors_books','id');
    })->orderBy('books.title','asc')->get();
        $author = DB::table('authors')->where('name', 'like' , '%' . request('bookTitle') . '%')->orWhere('surname','like','%' . request('bookTitle') . '%')->get();
        return view('book', compact('book','category','author'));
    }

    function categoryFilter($id)
    {

       // $requestCategory = $request->input('category');
        $category = Category::all();

        $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn','authors.name','authors.id','authors.surname')->join('categories','categories.id','=','books.category_id')->where('categories.id','=', $id)->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->orderBy('books.title','asc')->get();

        $author = DB::table('authors')->select('authors.name','authors.surname','authors.id')->join('authors_books', 'authors_books.author_id','=','authors.id')->join('books','books.id','=','authors_books.book_id')->join('categories','categories.id','=','books.category_id')->where('categories.id','=', $id)->get();

        return view('book', compact('book','category','author'));

    }
    // public function bookautor($id)
    // {
    //     $category = Category::all();
    //     $author = DB::table('authors')->select('name','surname');
    //     $book = Book::all();
    //     return view('author',compact('category','author','book'));
    // }

    public function authorBooks($id){

        $book = DB::table('books')->select('isbn','title','description','authors.name','authors.surname')->join('authors_books','books.id','=','authors_books.book_id')->join('authors','authors.id','=','authors_books.author_id')->where('authors.id','=', $id)->get();
        return view('author',compact('book'));
    }

}
