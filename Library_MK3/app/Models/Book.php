<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    Use HasFactory;

    protected $fillable = [
        'title',
        'writer',
        'user2_id',
        'category_id',
        'publisher',
        'year',
        'stock'
    ];
}