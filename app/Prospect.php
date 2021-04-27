<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Prospect extends Model
{
    use SoftDeletes;
    
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
