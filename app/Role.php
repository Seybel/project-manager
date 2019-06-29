<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    //Defining Database Relationships
    public function users() {
        return $this->hasMany('App\User');
    }
}
