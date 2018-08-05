<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'exam_time', 'exam_date', 'exam_room', 'subject_id', 'instructor_id', 'questionnaire_id'
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function instructor()
    {
        return $this->hasOne(User::class, 'id', 'instructor_id');
    }
}
