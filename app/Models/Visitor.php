<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'visitors';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['page', 'visit_date', 'book_id', 'page_name'];
}
