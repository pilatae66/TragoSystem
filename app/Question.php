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
        return $this->belongsTo(Subject::class, 'subjID', 'id');
    }

    public function instructor()
    {
        return $this->hasOne(User::class, 'instID', 'id');
    }

    public function answer(){
        return $this->hasOne(Answer::class, 'questionID', 'id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'questionID', 'id');
    }
}
