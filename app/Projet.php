<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    public function statut()
    {
        return $this->belongsTo('App\Statut');
    }

    public function prospect()
    {
        return $this->belongsTo('App\Prospect');
    }

    public function assures()
    {
        return $this->hasMany('App\Assure');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
    public function rappels()
    {
        return $this->hasMany('App\Rappel');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function taches()
    {
        return $this->hasMany('App\Tache');
    }

    public function historiques()
    {
        return $this->hasMany('App\Historique');
    }

    public function communications()
    {
        return $this->hasMany('App\Communication');
    }

    public function contrat()
    {
        return $this->hasOne('App\Contrat');
    }
    


}
