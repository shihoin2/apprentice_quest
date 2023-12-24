<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'article_id',
        'user_id',
    ];

}
