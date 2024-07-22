<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();       
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
             $table->string('email');
            $table->string('password');
            $table->string('instituicao')->nullable();
            $table->string('filename')->nullable();   
            $table->string('mime')->nullable();   
            $table->string('original_filename')->nullable();
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();

        });

        $u = new User();
        $u->name='root';
        $u->email='root@hotmail.com';
        $u->password=bcrypt('18721872');
        $u->admin=true;
        $u->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
