<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public function pollOptions()
    {
        return $this->hasMany('App\ElectionPollOption');
    }
}
