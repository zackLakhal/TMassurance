<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Document extends Model
{
    use SoftDeletes;
    
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function communications()
    {
        return $this->belongsToMany('App\Communication');
    }

   
}
