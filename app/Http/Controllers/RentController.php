<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publishing;
use App\Models\Author;
use App\Models\Rent;
use App\Models\AuthorBook;
use Carbon\Carbon;
use Auth;
use DB;

class RentController extends Controller
{
    function index()
    {
    	$user_id = Auth::user()->id;
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate')->join('books','books.id','=','rents.book_id')->join('users','rents.user_id','=','users.id')->where('rents.user_id','=',$user_id)->get();
    	return view('rents',compact('rent'));
    }

    function rent($id)
    {
    	$book_id = DB::table('books')->select('id',)->where('books.id',$id)->value('id');
    	$user_id = Auth::user()->id;
    	$bookQuantity = DB::table('books')->select('quantity')->where('id',$book_id)->value('quantity');
    	$rentDate = Carbon::now();
    	$returnDate = Carbon::now()->addDays(7);
    	$existRent = Rent::where('user_id',$user_id)->where('book_id',$book_id)->first();
    	if($existRent == null)
    	{
    		
    		$book = Book::where('id',$book_id)->first();
    		if($book->quantity<1)
    		{
    			return redirect()->back()->with('info','nie mamy na stanie tej książki');
    		}
    		else
    		{
    		$book->quantity = $bookQuantity-1;
    		$book->save();

    		Rent::create(array(
    		'rent_date' => $rentDate,
    		'return_date' => $returnDate,
    		'book_id' => $book_id,
    		'user_id' => $user_id,));
    		}
    	}
    	else
    	{
    		return redirect()->back()->with('info','nie możesz kilkukrotnie wypożyczyć jednej książki');
    	}
    	
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',$user_id)->get();
    	return view('rents',compact('rent'));
    }

    function showRents()
    {
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->get();
    	return view('rents',compact('rent'));
    }

    function showRent($id)
    {
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.book_id','=',$id)->get();
    	return view('rents',compact('rent'));
    }

}
