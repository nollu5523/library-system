<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id',
    	'booking',
    	'booking_end',
    	'rent_date',
    	'return_date',
        'returned',
    	'book_id',
    	'user_id',
    ];
}

