<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assure extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
