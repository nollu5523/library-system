<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publishing;
use App\Models\Author;
use App\Models\AuthorBook;
use DB;

class BookController extends Controller
{
	function index()
    {
        $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();

        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $authorsList = Author::select('id','name','surname')->get();
        return view('bookAdd',compact('book','categoryList','publishingList','authorsList'));
    }

    function add(Request $request)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $authorsList = Author::select('id','name','surname')->get();
        $category_id = DB::table('categories')->select('id')->where('category',$request->category)->value('id');
        $publishing_id = DB::table('publishings')->select('id')->where('name',$request->publishing)->value('id');
        $author_id = DB::table('authors')->select('id')->where('id',$request->author)->value('id');

        $author = $request->input('author');
        
        
       
        $this->validate($request, array(
            'isbn' => 'required|unique:books|max:40',
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'quantity' => 'required|numeric',
        ));

        Book::create(array(
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $category_id,
            'publishing_id' => $publishing_id,
            'quantity' => $request->input('quantity'),
        ));

        $book_id = DB::table('books')->select('id')->orderBy('id','desc')->value('id');
        
        for($i=0;$i<count($author); $i++)
        {
            AuthorBook::create(array(
            'author_id' => $author[$i],
            'book_id' => $book_id,
        ));

        }
        
        $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();

        return view('bookAdd',compact('book','categoryList','publishingList','authorsList'))->with('info','Pomyślnie dodano książkę');
    }

    public function delete($id)
    {
        $query = DB::table('rents')->select('book_id')->where('book_id',$id);
        if($query)
        {
            $categoryList = Category::select('id','category')->get();
            $publishingList = Publishing::select('id','name')->get();
            $authorsList = Author::select('id','name','surname')->get();
            $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();
            return view('bookAdd',compact('book','categoryList','publishingList','authorsList'))->with('info','Nie można usunąć książki, która aktualnie jest wypożyczana');
        }
        else
        {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $authorsList = Author::select('id','name','surname')->get();
        $delete = Book::where('id',$id);
        $delete->delete();
        $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();
        return view('bookAdd',compact('book','categoryList','publishingList','authorsList'))->with('info','Pomyślnie usunięto książkę');
        }
    }

    public function edit($id)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $authorsList = Author::select('id','name','surname')->get();
        $edit = Book::where('id',$id)->first();
        $category = Category::where('id',$edit->category_id)->first();
        $publishing = Publishing::where('id',$edit->publishing_id)->first();

        $author = DB::table('authors')->select('id','name','surname')->leftjoin('authors_books','authors_books.author_id','=','authors.id')->where('book_id',$edit->id)->first();


        return view('edit',compact('edit','publishing','category','author','categoryList','publishingList','authorsList'));
    }
    
    public function update(Request $request)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $authorsList = Author::select('id','name','surname')->get();

        $category_id = DB::table('categories')->select('id')->where('id',$request->category)->value('id');
        $publishing_id = DB::table('publishings')->select('id')->where('id',$request->publishing)->value('id');
        $author_id = DB::table('authors')->select('id')->where('id',$request->author)->value('id');
        $book_id = DB::table('books')->select('id')->where('id',$request->id)->value('id');
        $author = $request->input('author');
        $saveBook = Book::where('id',$request->id)->first();
        $saveBook->isbn = $request->isbn;
        $saveBook->title = $request->title;
        $saveBook->description = $request->description;
        $saveBook->quantity = $request->quantity;
        $saveBook->category_id = $category_id;
        $saveBook->publishing_id = $publishing_id;
        $saveBook->save();


        
        
        $BookAuthor = DB::table('authors_books')->select('author_id','book_id')->where('author_id',$author_id)->where('book_id',$book_id)->get();
       
        // return view('test',compact('BookAuthor'));
        
        if($BookAuthor==null)
        {
                $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();
            return view('bookAdd',compact('book','categoryList','publishingList','authorsList'))->with('info','Pomyślnie zaktualizowano książkę');
        }
        else
        {
            $delete = AuthorBook::where('book_id',$book_id);
            $delete->delete();
            for($i=0;$i<count($author); $i++)
            {
            AuthorBook::create(array(
            'author_id' => $author[$i],
            'book_id' => $book_id,
            ));
            }
            $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();
            
            return view('bookAdd',compact('book','categoryList','publishingList','authorsList'))->with('info','Pomyślnie zaktualizowano książkę');
        }
        

        
    }

    function details($title)
    {
        $book = DB::table('books')->select('title','isbn','books.id','description','category','quantity','publishings.name AS publishing',DB::raw("GROUP_CONCAT(authors.name, authors.surname SEPARATOR ', ') AS name"))->leftjoin('categories','categories.id','=','books.category_id')->leftjoin('publishings','publishings.id','=','books.publishing_id')->leftjoin('authors_books','authors_books.book_id','=','books.id')->leftjoin('authors','authors_books.author_id','=','authors.id')->orderBy('title','asc')->groupBy('title','isbn','books.id','description','category','quantity','publishing')->get();

        return view('author',compact('book'));
    }
}

