<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produit extends Model
{
    use SoftDeletes;
    
    public function contrats ()
    {
        return $this->hasMany('App\Contrat');
    }

    public function compagnie ()
    {
        return $this->belongsTo('App\Compagnie');
    }
}
