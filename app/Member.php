<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function voteCodes()
    {
        return $this->hasMany('App\VoteCode');
    }
}
