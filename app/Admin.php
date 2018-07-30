<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname', 'lastname'
    ];

    protected $hidden = [
        'password', 'token'
    ];

    public $incrementing = false;
}
