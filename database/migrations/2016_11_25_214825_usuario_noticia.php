<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioNoticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                 $this->down();       
        Schema::create('usuario_noticias', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('usuario_id')->unsigned();
            $table->integer('noticia_id')->unsigned();

            $table->primary(['usuario_id','noticia_id']);

            $table->foreign('usuario_id')->references('id')->on('usuarios');
                    
            $table->foreign('noticia_id')->references('id')->on('noticias');
                   
    });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('usuario_noticias');
    }
}
