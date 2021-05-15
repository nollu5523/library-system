<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DB;

class BookController extends Controller
{
	function index()
    {
    	$book = Book::all();
        return view('bookAdd',compact('book'));
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
        $book = Book::all();
        return view('bookAdd',compact('book'))->with('info','Pomyślnie dodano książkę');
    }
    public function delete($id)
    {
        $delete = Book::where('id',$id);
        $delete->delete();
        $book = Book::all();
        return view('bookAdd',compact('book'))->with('info','Pomyślnie usunięto książkę');
    }
    public function edit($id)
    {
        $edit = Book::where('id',$id)->first();
        return view('edit')->with('edit', $edit);
    }
    public function update(Request $request)
    {
        $save = Book::where('id',$request->id)->first();
        $save->isbn = $request->isbn;
        $save->title = $request->title;
        $save->description = $request->description;
        $save->category_id = $request->category_id;
        $save->publishing_id = $request->publishing_id;
        $save->save();

        $book = Book::all();

        return view('bookAdd',compact('book'))->with('info','Pomyślnie zaktualizowano książkę');
    }

    function details($title)
    {
        $book = DB::table('books')->select('title','isbn','authors.name','authors.surname','categories.category','description')->join('authors_books','authors_books.book_id','=','books.id')->join('categories','categories.id','=','books.category_id')->join('authors','authors.id','=','authors_books.author_id')->where('title','like',$title)->get();

        return view('author',compact('book'));
    }
}
