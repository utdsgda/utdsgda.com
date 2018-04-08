<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function pollOption()
    {
        return $this->belongsTo('App\ElectionPollOption');
    }

    public function voteCode()
    {
        return $this->belongsTo('App\VoteCode');
    }
}
