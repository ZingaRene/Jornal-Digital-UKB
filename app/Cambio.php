<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cambio extends Model
{
    

protected $fillable   = ['dolar_americano',
                         'euro',
                         'yen_japones',
                         'yuan_chines',
                         'real_brasileiro',
                         'franco_congoles',
                         'metical_moçambicano'];
    
public function usuario(){

	return $this->belongsTo('App\Usuario');
}

}
