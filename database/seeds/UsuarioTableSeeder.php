<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Request $request)
    {
        factory(App\Usuario::class)->create([
         'name'=>'jonh' 
         'password'=>bcrypt('123mudar') 
          'instituicao'=>'ISP'   
        ]);
        
         factory(App\Usuario::class, 9)->create();
    }
}
