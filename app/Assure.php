<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Assure extends Model
{
    use SoftDeletes;
    
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
