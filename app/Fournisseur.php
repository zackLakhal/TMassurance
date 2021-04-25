<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    public function provenances()
    {
        return $this->belongsToMany('App\Provenance');
    }
}
