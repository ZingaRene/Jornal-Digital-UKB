<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Clima extends Model
{
  
protected $fillable   = ['benguela',
                         'ganda',
                         'cubal',
                         'baia-farta',
                         'chongoroi',
                         'caimbambo',
                         'balombo',
                         'lobito',
                         'bocoio'
                         ];

  public function usuario(){

	return $this->belongsTo('App\Usuario');
}

}
