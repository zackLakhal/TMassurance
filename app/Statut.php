<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Statut extends Model
{
    use SoftDeletes;

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
