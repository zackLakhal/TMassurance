<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compagnie extends Model
{
    use SoftDeletes;
    
    public function produits ()
    {
        return $this->hasMany('App\Produit');
    }
}
