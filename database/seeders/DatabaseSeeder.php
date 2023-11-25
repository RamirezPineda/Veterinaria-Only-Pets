<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\VentaProducto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(PersonaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);

        $this->call(ServicioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(VeterinarioSeeder::class);
        $this->call(AdministrativoSeeder::class);
        $this->call(MascotaSeeder::class);
        $this->call(ClienteMascotaSeeder::class);
        $this->call(HistorialClinicoSeeder::class);
        $this->call(VacunaSeeder::class);
        $this->call(EnfermedadSeeder::class);
        $this->call(CirugiaSeeder::class);
        $this->call(DetalleVacunaSeeder::class);
        $this->call(DetalleCirugiaSeeder::class);
        $this->call(DetalleEnfermedadSeeder::class);
        $this->call(DetalleHistorialSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(NotaIngresoSeeder::class);
        $this->call(VentaSeeder::class);
        $this->call(VentaProductoSeeder::class);
        $this->call(VentaServicioSeeder::class);

    }
}
