<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fournisseur extends Model
{
    use SoftDeletes;
    
    public function provenance()
    {
        return $this->belongsTo('App\Provenance');
    }
}
