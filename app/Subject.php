<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Subject extends Model
{
    protected $fillable = [
        'subTitle', 'instID'
    ];

    public function instructor()
    {
        return $this->hasOne(User::class, 'id', 'instID');
    }
}
