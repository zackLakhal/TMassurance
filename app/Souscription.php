<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Souscription extends Model
{

    use SoftDeletes;
    
    public function contrat()
    {
        return $this->hasOne('App\Contrat');
    }
}
