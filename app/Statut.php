<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
