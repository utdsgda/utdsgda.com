<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionPollOption extends Model
{
    public function election()
    {
        return $this->belongsTo('App\Election');
    }

    public function votes() {
        return $this->hasMany('App\Vote');
    }
}
