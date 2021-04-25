<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function provenance()
    {
        return $this->belongsTo('App\Provenance');
    }

   
}
