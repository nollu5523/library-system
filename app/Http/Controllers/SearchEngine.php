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
        $book = DB::table('books')->select('title','isbn','books.id AS bid','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();
        $category = Category::all();
        $author = Author::all();
    	return view('book', compact('book','category','author'));
    }

    function findBook()
    {
    	$category = Category::all();
        $bookTitle = request('bookTitle');
        $f = explode(" ", $bookTitle);

        if(count($f)==6)
        {
            $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('title','like','%' . $f[1] . '%')->orWhere('title','like','%' . $f[2] . '%')->orWhere('title','like','%' . $f[3] . '%')->orWhere('title','like','%' . $f[4] . '%')->orWhere('title','like','%' . $f[5] . '%')->orWhere('name','like','%' . $f[0] . '%')->orWhere('name','like','%' . $f[1] . '%')->orWhere('name','like','%' . $f[2] . '%')->orWhere('name','like','%' . $f[3] . '%')->orWhere('name','like','%' . $f[4] . '%')->orWhere('name','like','%' . $f[5] . '%')->orWhere('surname','like','%' . $f[0] . '%')->orWhere('surname','like','%' . $f[1] . '%')->orWhere('surname','like','%' . $f[2] . '%')->orWhere('surname','like','%' . $f[3] . '%')->orWhere('surname','like','%' . $f[4] . '%')->orWhere('surname','like','%' . $f[5] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        elseif(count($f)==5)
        {
            $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('title','like','%' . $f[1] . '%')->orWhere('title','like','%' . $f[2] . '%')->orWhere('title','like','%' . $f[3] . '%')->orWhere('title','like','%' . $f[4] . '%')->orWhere('name','like','%' . $f[0] . '%')->orWhere('name','like','%' . $f[1] . '%')->orWhere('name','like','%' . $f[2] . '%')->orWhere('name','like','%' . $f[3] . '%')->orWhere('name','like','%' . $f[4] . '%')->orWhere('surname','like','%' . $f[0] . '%')->orWhere('surname','like','%' . $f[1] . '%')->orWhere('surname','like','%' . $f[2] . '%')->orWhere('surname','like','%' . $f[3] . '%')->orWhere('surname','like','%' . $f[4] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        elseif(count($f)==4)
        {
            $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('title','like','%' . $f[1] . '%')->orWhere('title','like','%' . $f[2] . '%')->orWhere('title','like','%' . $f[3] . '%')->orWhere('name','like','%' . $f[0] . '%')->orWhere('name','like','%' . $f[1] . '%')->orWhere('name','like','%' . $f[2] . '%')->orWhere('name','like','%' . $f[3] . '%')->orWhere('surname','like','%' . $f[0] . '%')->orWhere('surname','like','%' . $f[1] . '%')->orWhere('surname','like','%' . $f[2] . '%')->orWhere('surname','like','%' . $f[3] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        elseif(count($f)==3)
        {
            $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('title','like','%' . $f[1] . '%')->orWhere('title','like','%' . $f[2] . '%')->orWhere('name','like','%' . $f[0] . '%')->orWhere('name','like','%' . $f[1] . '%')->orWhere('name','like','%' . $f[2] . '%')->orWhere('surname','like','%' . $f[0] . '%')->orWhere('surname','like','%' . $f[1] . '%')->orWhere('surname','like','%' . $f[2] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        elseif(count($f)==2)
        {
        $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('title','like','%' . $f[1] . '%')->orWhere('name','like','%' . $f[0] . '%')->orWhere('name','like','%' . $f[1] . '%')->orWhere('surname','like','%' . $f[0] . '%')->orWhere('surname','like','%' . $f[1] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        else
        {
        $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like','%' . $f[0] . '%')->orWhere('name', 'like' , '%' . $f[0] . '%')->orWhere('surname','like','%' . $f[0] . '%')->groupBy('title','isbn','books.id','description','quantity')->get();
        }
        
        
        return view('book', compact('book','category'));
    }

    function categoryFilter($id)
    {

       // $requestCategory = $request->input('category');
        $category = Category::all();

        $book = DB::table('books')->select('books.id as bid','books.title','books.description','books.isbn',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->join('categories','categories.id','=','books.category_id')->where('categories.id','=', $id)->join('authors_books','authors_books.book_id','=','books.id')->join('authors','authors.id','=','authors_books.author_id')->orderBy('books.title','asc')->groupBy('title','isbn','books.id','description','category','quantity')->get();

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
