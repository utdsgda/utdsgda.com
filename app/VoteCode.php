<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteCode extends Model
{
    public function election()
    {
        return $this->belongsTo('App\Election');
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function vote()
    {
        return $this->hasOne('App\Vote');
    }
}
