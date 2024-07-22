<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token',];

    public function noticia() {

        return $this->belongsToMany('App\Noticia');
    } 

    public function sugestao()
    {

        return $this->belongsToMany('App\Sugestao');
    }

    public function cambio()
    {

        return $this->hasMany('App\Cambio');
    }

    public function clima()
    {

        return $this->hasMany('App\Clima');
    }
}
