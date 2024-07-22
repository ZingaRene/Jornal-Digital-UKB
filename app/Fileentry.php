<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    //
    protected $fillable=['id','descricao'];

    public function material(){
        return $this->hasOne('App\Material','file_id');
    }
}
