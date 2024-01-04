<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mascota::create([
            'nombre' => 'Firulais', 
            'raza' => 'Pitbull', 
            'fecha_nacimiento' => '2021-05-14', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe con blanco', 
            'sexo'=> 'Macho', 
            'foto' => 'https://t2.uc.ltmcdn.com/es/posts/4/9/4/red_nose_pitbull_45494_7_600.jpg'
        ]);
        Mascota::create([
            'nombre' => 'Monchito', 
            'raza' => 'Bulldog', 
            'fecha_nacimiento' => '2020-01-22', 
            'especie' => 'perro', 
            'descripcion' => 'color negro', 
            'sexo'=> 'Macho', 
            'foto'=> 'https://www.bunko.pet/__export/1658966510396/sites/debate/img/2022/07/27/perrito-bulldog-ingles.jpg_423682103.jpg'
        ]);
        Mascota::create([
            'nombre' => 'Manchas', 
            'raza' => 'Boxer', 
            'fecha_nacimiento' => '2021-02-11', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco con negro', 
            'sexo'=> 'Macho', 
            'foto' => 'https://www.santevet.es/uploads/images/es_ES/razas/boxer_seguro_perro_santevet.jpeg'
        ]);
        Mascota::create([
            'nombre' => 'Boby', 
            'raza' => 'Husky', 
            'fecha_nacimiento' => '2019-12-30', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe', 
            'sexo'=> 'Macho', 
            'foto' => 'https://images.hola.com/imagenes/mascotas/20201005176621/perro-husky-raza-perro-lobo/0-874-110/husky-1-a.jpg'
        ]);
        Mascota::create([
            'nombre' => 'Luna', 
            'raza' => 'Doberman', 
            'fecha_nacimiento' => '2019-10-17', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco', 
            'sexo'=> 'Hembra', 
            'foto' => 'https://t1.uc.ltmcdn.com/es/posts/9/5/5/como_es_el_temperamento_del_doberman_52559_600_square.jpg'
        ]);
        Mascota::create([
            'nombre' => 'Panquesito', 
            'raza' => 'Pitbull', 
            'fecha_nacimiento' => '2018-10-10', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe con negro', 
            'sexo'=> 'Hembra', 
            'foto' => 'https://t2.uc.ltmcdn.com/es/posts/4/9/4/red_nose_pitbull_45494_7_600.jpg'
        ]);
        Mascota::create([
            'nombre' => 'Bethoben', 
            'raza' => 'Golden Retriever', 
            'fecha_nacimiento' => '2019-04-07', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco', 
            'sexo'=> 'Macho', 
            'foto' => 'https://t2.ea.ltmcdn.com/es/posts/1/6/2/10_curiosidades_del_golden_retriever_21261_orig.jpg'
        ]);
        
    }
}
