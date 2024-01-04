<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'id' => '8', 
            'contacto_emergencia' => '72145856'
        ]);
        Cliente::create([
            'id' => '9', 
            'contacto_emergencia' => '66745856'
        ]);
        Cliente::create([
            'id' => '10', 
            'contacto_emergencia' => '72145123'
        ]);
        Cliente::create([
            'id' => '11', 
            'contacto_emergencia' => '72140146'
        ]);
        Cliente::create([
            'id' => '12', 
            'contacto_emergencia' => '79985856'
        ]);
    }
}
