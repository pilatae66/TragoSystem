<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname', 'lastname', 'year', 'course'
    ];

    protected $hidden = [
        'remember_token', 'password'
    ];
    public $incrementing = false;

    public function getFullNameAttribute(){
        return $this->firstname . " " . $this->lastname;
    }
}
