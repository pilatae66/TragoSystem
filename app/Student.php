<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'year', 'course'
    ];

    protected $hidden = [
        'remember_token', 'password'
    ];
    public $incrementing = false;
}
