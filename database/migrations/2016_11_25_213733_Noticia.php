<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                 $this->down();       
        Schema::create('noticias', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');   
           $table->string('filename');   
           $table->string('mime');   
           $table->string('original_filename');
           $table->string('instituicao'); 
           $table->longtext('informacao');
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
        
        Schema::dropIfExists('noticias');
    }
}
