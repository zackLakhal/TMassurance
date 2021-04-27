<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contrat extends Model
{
    use SoftDeletes;
    
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }

    public function souscription()
    {
        return $this->belongsTo('App\Souscription');
    }

}
