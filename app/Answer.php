<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    protected $fillable = [
        'ansKey', 'questionID'
    ];

    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'questionID');
    }
}
