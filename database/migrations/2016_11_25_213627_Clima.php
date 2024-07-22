<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                 $this->down();       
        Schema::create('climas', function (Blueprint $table) {
             $table->engine = "InnoDB";
              $table->increments('id');
                $table->integer('benguela')->nullable();
                $table->integer('ganda')->nullable();
                $table->integer('cubal')->nullable();
                $table->integer('baia')->nullable();
                $table->integer('chongoroi')->nullable();
                $table->integer('caimbambo')->nullable();
                $table->integer('balombo')->nullable();
                $table->integer('lobito')->nullable();
                $table->integer('bocoio')->nullable();
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
        Schema::dropIfExists('climas');

    }
}
