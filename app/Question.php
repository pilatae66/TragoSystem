<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;
use App\User;

class Question extends Model
{
    protected $fillable = [
        'question', 'subjID', 'instID'
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subjID');
    }

    public function instructor()
    {
        return $this->hasOne(User::class, 'id', 'instID');
    }
}
