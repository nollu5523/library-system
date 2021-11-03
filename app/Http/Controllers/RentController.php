<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publishing;
use App\Models\Author;
use App\Models\Rent;
use App\Models\User;
use App\Models\AuthorBook;
use Carbon\Carbon;
use Auth;
use DB;

class RentController extends Controller
{
    function index()
    {
        $user_id = Auth::user()->id;
        $rent = DB::table('rents')->select('users.name','users.surname','books.title','rents.id as rent_id','books.id','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('books','books.id','=','rents.book_id')->join('users','rents.user_id','=','users.id')->where('rents.user_id','=',$user_id)->get();
        return view('rents',compact('rent'));
    }

    function booking($id)
    {
        $user_id = Auth::user()->id;
        $booking = Carbon::now();
        $booking_end = Carbon::now()->addDays(2);
        $existRent = Rent::where('user_id',$user_id)->where('book_id',$id)->orderBy('id','desc')->first();
        if( ($existRent == null) || (($existRent != null) && ($existRent->returned != null)) )
        {
            $user_verify = User::where('id',$user_id)->first();
            if( $user_verify->rents >= 5 )
            {
                return redirect()->back()->with('info','nie możesz wykonać więcej niż 5 rezerwacji/wypożyczeń');
            }
            else
            {
                $book = Book::where('id',$id)->first();
                if($book->quantity<1)
                {
                    return redirect()->back()->with('info','nie mamy na stanie tej książki');
                }
                else
                {
                $book->quantity = $book->quantity-1;
                $book->save();
                $user_verify->rents = $user_verify->rents + 1;
                $user_verify->save();
                Rent::create(array(
                'booking' => $booking,
                'booking_end' => $booking_end,  
                'book_id' => $id,
                'user_id' => $user_id,));
                }
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
        if(Auth::user()->admin)
        {
        $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->orderBy('rents.id','asc')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',Auth::user()->id)->orderBy('rents.id','asc')->get();
        }
        return view('rents',compact('rent'));
    }

    function showRent($id)
    {
        $rent = DB::table('rents')->select('users.name','users.surname', 'rents.id as rent_id', 'books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.book_id','=',$id)->get();
        return view('rents',compact('rent'));
    }

    function rent($id)
    {
        
        $rented = Rent::where('id',$id)->first();
        $rented->rent_date = Carbon::now();
        $rented->return_date = Carbon::now()->addDays(7);
        $rented->save();
        if(Auth::user()->admin)
        {
            $rent = DB::table('rents')->select('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',Auth::user()->id)->get();
        }
        return view('rents',compact('rent'));

    }


    function return($id)
    {
        $returnedRent = Rent::where('id',$id)->first();
        $book = Book::where('id',$returnedRent->book_id)->first();
        $book->quantity = $book->quantity+1;
        $book->save();
        $user_verify = User::where('id',$returnedRent->user_id)->first();
        $user_verify->rents = $user_verify->rents - 1;
        $user_verify->save();
        $returnedRent->returned = Carbon::now();
        $returnedRent->save();
        if(Auth::user()->admin)
        {
            $rent = DB::table('rents')->select('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',Auth::user()->id)->get();
        }
        return view('rents',compact('rent'));
    }
    function showBooked()
    {
        if(Auth::user()->admin)
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('returned','=', null)->where('rent_date','=', null)->where('booking', '!=', null)->where('booking_end', '>=', Carbon::now())->orderBy('rents.id','asc')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rents.user_id','=',Auth::user()->id)->where('returned','=', null)->where('rent_date','=', null)->where('booking', '!=', null)->where('booking_end', '>=', Carbon::now())->orderBy('rents.id','asc')->get();
        }
        return view('rents',compact('rent'));
    }
    function showRented()
    {
        if(Auth::user()->admin)
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rent_date','!=', null)->where('returned','=',null)->orderBy('rents.id','asc')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('rent_date','!=', null)->where('returned','=',null)->where('rents.user_id','=',Auth::user()->id)->get();
        }
        return view('rents',compact('rent'));
    }
    function showReturned()
    {
        if(Auth::user()->admin)
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('returned','!=',null)->orderBy('rents.id','asc')->get();
        }
        else
        {
            $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('returned','!=',null)->where('rents.user_id','=',Auth::user()->id)->get();
        }
        return view('rents',compact('rent'));
    }
    function findPerson()
    {
        $surname = request('surname');
        $rent = DB::table('rents')->select('rents.id as rent_id','users.name','users.surname','books.id','books.title','rents.booking as booking', 'rents.booking_end as bookingEnd','rents.rent_date as rentDate', 'rents.return_date as returnDate','rents.returned')->join('users','rents.user_id','=','users.id')->join('books','books.id','=','rents.book_id')->where('surname','like', '%' . $surname . '%')->orderBy('rents.id','asc')->get();
        
        return view('rents',compact('rent'));
    }
}