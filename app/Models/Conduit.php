<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conduit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'about',
        'detail',
        'tag',
        'user_id',
    ];

}
