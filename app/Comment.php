<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Allows user input data using fillable

    protected $fillable = [
        'body',
        'url',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];

}
