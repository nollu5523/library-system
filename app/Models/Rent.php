<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id',
    	'rent_date',
    	'return_date',
    	'book_id',
    	'user_id',
    ];
}

