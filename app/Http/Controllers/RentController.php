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
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','books.id','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('books','books.id','=','rents.book_id')->join('users','rents.user_id','=','users.id')->where('rents.user_id','=',$user_id)->get();
    	return view('rents',compact('rent'));
    }

    function rent($id)
    {
    	$book_id = DB::table('books')->select('id',)->where('books.id',$id)->value('id');
    	$user_id = Auth::user()->id;
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
    		$book->quantity = $book->quantity-1;
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
    	
    	$rent = DB::table('rents')->select('users.name','users.surname','books.title','books.id','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',$user_id)->get();
    	return view('rents',compact('rent'));
    }

    function showRents()
    {
    	$rent = DB::table('rents')->select('rents.id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->orderBy('rents.id','asc')->get();
    	return view('rents',compact('rent'));
    }

    function showRent($id)
    {
    	$rent = DB::table('rents')->select('users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.book_id','=',$id)->get();
    	return view('rents',compact('rent'));
    }


    function return($id)
    {
    	$returnedRent = Rent::where('book_id',$id)->first();
    	$book = Book::where('id',$id)->first();
    	$book->quantity = $book->quantity+1;
    	$book->save();
    	$returnedRent->delete();
    	if(Auth::user()->czy_admin)
    	{
    		$rent = DB::table('rents')->select('users.name','users.surname','books.id','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->get();
    	}
    	else
    	{
    		$rent = DB::table('rents')->select('users.name','users.surname','books.id','books.title','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',Auth::user()->id)->get();
    	}
    	return view('rents',compact('rent'));
    }
    function showBooked()
    {
    	$rent = DB::table('rents')->select('rents.id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('booking', '!=', null)->where('booking_end', '<=', Carbon::now())->orderBy('rents.id','asc')->get();
    	return view('rents',compact('rent'));
    }
    function showRented()
    {
    	$rent = DB::table('rents')->select('rents.id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('returned','=',null)->orderBy('rents.id','asc')->get();
    	return view('rents',compact('rent'));
    }
    function showReturned()
    {
    	$rent = DB::table('rents')->select('rents.id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('returned','!=',null)->orderBy('rents.id','asc')->get();
    	return view('rents',compact('rent'));
    }
    function findPerson()
    {
    	$surname = request('surname');
    	$rent = DB::table('rents')->select('rents.id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('surname','like', '%' . $surname . '%')->orderBy('rents.id','asc')->get();
    	
    	return view('rents',compact('rent'));
    }
}
