<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
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
