<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    function index()
    {
        $books = Book::all();
        return view('bookAdd',compact('books')); 
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
        return back()->with('info', 'Dodano pomyślnie książkę');
        //return view('bookAdd')->with('info', 'Dodano pomyślnie książkę');
    }
    public function delete($id)
    {
        $delete = Book::where('id',$id);
        $delete->delete();
        return redirect()->back();
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
        return redirect('bookAdd');
    }

}
