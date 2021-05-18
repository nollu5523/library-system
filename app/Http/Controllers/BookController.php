<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publishing;
use DB;

class BookController extends Controller
{
	function index()
    {
        $book = DB::table('books')->select('title','isbn','books.id','description','category','name')->join('categories','categories.id','=','books.category_id')->join('publishings','publishings.id','=','books.publishing_id')->get();

        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();

        return view('bookAdd',compact('book','categoryList','publishingList'));
    }
    function add(Request $request)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $category_id = DB::table('categories')->select('id')->where('category',$request->category)->value('id');
        $publishing_id = DB::table('publishings')->select('id')->where('name',$request->publishing)->value('id');

        $this->validate($request, array(
            'isbn' => 'required|max:40',
            'title' => 'required|max:100',
            'description' => 'required|max:1000',

        ));

        Book::create(array(
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $category_id,
            'publishing_id' => $publishing_id,
        ));
        $book = Book::all();

        return view('bookAdd',compact('book','categoryList','publishingList'))->with('info','Pomyślnie dodano książkę');
    }
    public function delete($id)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $delete = Book::where('id',$id);
        $delete->delete();
        $book = Book::all();
        return view('bookAdd',compact('book','categoryList','publishingList'))->with('info','Pomyślnie usunięto książkę');
    }
    public function edit($id)
    {
        $edit = Book::where('id',$id)->first();
        return view('edit')->with('edit', $edit);
    }
    public function update(Request $request)
    {
        $categoryList = Category::select('id','category')->get();
        $publishingList = Publishing::select('id','name')->get();
        $save = Book::where('id',$request->id)->first();
        $save->isbn = $request->isbn;
        $save->title = $request->title;
        $save->description = $request->description;
        $save->category_id = $request->category_id;
        $save->publishing_id = $request->publishing_id;
        $save->save();

        $book = Book::all();

        return view('bookAdd',compact('book','categoryList','publishingList'))->with('info','Pomyślnie zaktualizowano książkę');
    }

    function details($title)
    {
        $book = DB::table('books')->select('title','isbn','authors.name','authors.surname','categories.category','description')->join('authors_books','authors_books.book_id','=','books.id')->join('categories','categories.id','=','books.category_id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like',$title)->get();

        return view('author',compact('book'));
    }
}

