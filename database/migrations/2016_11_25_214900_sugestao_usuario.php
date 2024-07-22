<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SugestaoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();       
        Schema::create('sugestao_usuarios', function (Blueprint $table) {
             $table->engine = "InnoDB";
             $table->integer('usuario_id')->unsigned();
            $table->integer('sugestao_id')->unsigned();

            $table->primary(['usuario_id','sugestao_id']);

            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->foreign('sugestao_id')->references('id')->on('sugestaos');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugestao_usuarios');
    }
}
