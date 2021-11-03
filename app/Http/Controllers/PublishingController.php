<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishing;

class PublishingController extends Controller
{
    function index()
    {
        $publishing = Publishing::all();
    	return view('publishingAdd',compact('publishing'));
    }
    function add(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|alphaNum|unique:publishings|max:100',
        ));

        Publishing::create(array(
            'name' => $request->input('name'),
        ));
        $publishing = Publishing::all();
        return view('publishingAdd',compact('publishing'))->with('info','Pomyślnie dodano wydawnictwo');
    }
    function edit($id)
    {
        $edit = Publishing::where('id',$id)->first();
        return view('editPublishing',compact('edit'));
    }
    function delete($id)
    {
        $publishing = Publishing::where('id',$id)->first();
        $publishing->delete();
        $publishing = Publishing::all();
        return view('publishingAdd',compact('publishing'))->with('info','Pomyślnie usunięto wydawnictwo');
    }
    function update(Request $request)
    {
        $publishing = Publishing::where('id',$request->id)->first();
        $publishing->name = $request->name;
        $publishing->save();
        $publishing = Publishing::all();

        return view('publishingAdd',compact('publishing'))->with('info','Pomyślnie zaktualizowano wydawnictwo');
    }
}
