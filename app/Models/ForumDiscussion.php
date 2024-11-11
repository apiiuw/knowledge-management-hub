<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDiscussion extends Model
{
    use HasFactory;

    // Tentukan atribut yang bisa diisi (fillable)
    protected $fillable = [
        'question', 'status', 'date',
    ];
}
