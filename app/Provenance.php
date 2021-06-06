<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Provenance extends Model
{
    use SoftDeletes;
    
    public function prospects ()
    {
        return $this->hasMany('App\Prospect');
    }

    public function fournisseur()
    {
        return $this->belongsTo('App\Provenance');
    }
    
}
