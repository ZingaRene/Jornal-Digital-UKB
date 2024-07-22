<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    
    protected $fillable   = ['id','informacao','instituicao'];

    public function usuario()
    {

    	return $this->belongsToMany('App\Usuario');
    }
}
