<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function prospects()
    {
        return $this->hasMany('App\Prospect');
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
}
