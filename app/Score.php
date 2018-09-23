<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Subject;
use App\User;

class Score extends Model
{
    protected $fillable = [
        'score', 'studID', 'subjID', 'instID'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subjID');
    }

    public function instructor()
    {
        return $this->hasOne(User::class, 'id', 'instID');
    }
}
