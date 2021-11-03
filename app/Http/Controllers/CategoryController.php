<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $category = Category::all();
    	return view('categoryAdd',compact('category'));
    }
    function add(Request $request)
    {
        $this->validate($request, array(
            'category' => 'required|alphaNum|unique:categories|max:40',
        ));

        Category::create(array(
            'category' => $request->input('category'),
        ));
        $category = Category::all();

        return view('categoryAdd',compact('category'))->with('info','Pomyślnie dodano kategorię');
    }
    function delete($id)
    {
        $category = Category::where('id',$id);
        $category->delete();
        $category = Category::all();
        return view('categoryAdd',compact('category'))->with('info','Pomyślnie usunięto kategorię');
    }

    function update(Request $request)
    {
        $category = Category::where('id',$request->id)->first();
        $category->category = $request->category;
        $category->save();
        $category = Category::all();
        return view('categoryAdd',compact('category'))->with('info','Pomyślnie zaktualizowano kategorię');
    }

    function edit($id)
    {
        $edit = Category::where('id',$id)->first();
        return view('editCategory',compact('edit'));
    }
}
