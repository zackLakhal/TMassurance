<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Souscription extends Model
{

    use SoftDeletes;
    
    public function contrats()
    {
        return $this->hasMany('App\Contrat');
    }
}
