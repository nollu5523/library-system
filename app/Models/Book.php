<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
    	'id',
    	'isbn',
    	'title',
    	'description',
        'quantity',
    	'category_id',
    	'publishing_id',
    ];

    protected $hidden = [
    	'category_id',
        'publishing_id',
    ];
}
