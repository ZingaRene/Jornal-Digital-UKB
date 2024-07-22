<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cambio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                 $this->down();       
        Schema::create('cambios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->float('dolar_americano',    8, 2)->nullable();
            $table->float('real_brasileiro',    8, 2)->nullable();
            $table->float('yuan_chines',        8, 2)->nullable();
            $table->float('franco_congoles',    8, 2)->nullable();
            $table->float('metical_mocambicano',8, 2)->nullable();
            $table->float('rand_namibiano',     8, 2)->nullable();
            $table->float('rand_sulafrica',     8, 2)->nullable();
            $table->float('escudo_cverde',      8, 2)->nullable();
            $table->float('Escudo_portugal',    8, 2)->nullable();
            $table->float('dobra_stome',        8, 2)->nullable();
            $table->float('centavo_tleste',     8, 2)->nullable();
            $table->float('pataca_macau',       8, 2)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->integer('usuario_id')->unsigned()->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('cambios');

    }
}
