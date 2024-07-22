<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sugestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
                 $this->down();       
        Schema::create('sugestaos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('instituicao');
            $table->longtext('descricao');
            $table->timestamps();         
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugestaos');
    }
}
