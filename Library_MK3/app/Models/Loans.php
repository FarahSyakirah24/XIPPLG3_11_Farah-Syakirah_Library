<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'book_id',
        'user_id',
        'loans_date',
        'return_date',
        'status'
    ];

    // Relasi ke tabel books
    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke tabel users
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}