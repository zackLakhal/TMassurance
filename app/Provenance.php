<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provenance extends Model
{
    public function prospects ()
    {
        return $this->hasMany('App\Prospect');
    }

    public function fournisseurs()
    {
        return $this->belongsToMany('App\Fournisseur');
    }
}
