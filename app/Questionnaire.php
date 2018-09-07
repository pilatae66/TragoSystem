<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'question_id'
    ];

    public function questions(){
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
}
