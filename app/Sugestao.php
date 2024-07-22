<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Sugestao extends Model
{
    
    
    protected $fillable   = ['id','descricao','instituicao'];

    public function usuario()
    {

    	return $this->belongsToMany('App\Usuario');
    }
}
