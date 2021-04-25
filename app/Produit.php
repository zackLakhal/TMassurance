<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function contrats ()
    {
        return $this->hasMany('App\Contrat');
    }

    public function compagnie ()
    {
        return $this->belongsTo('App\Compagnie');
    }
}
