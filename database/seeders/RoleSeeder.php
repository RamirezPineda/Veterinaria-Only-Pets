<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'super-admin']);
        $recepcion = Role::create(['name' => 'recepcionista']);
        $vet = Role::create(['name' => 'veterinario']);
        $client = Role::create(['name' => 'cliente']);
        $supervisor = Role::create(['name' => 'supervisor']);

        Permission::create(['name' => 'usuarios.index', 'description' => 'ver listado de usuarios'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'usuarios.create', 'description' => 'crear usuario'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'editar usuario'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'eliminar usuario'])->syncRoles([$recepcion]);


        Permission::create(['name' => 'administrativos.index', 'description' => 'ver listado de administrativos']);
        Permission::create(['name' => 'administrativos.create', 'description' => 'crear administrativo']);
        Permission::create(['name' => 'administrativos.edit', 'description' => 'editar administrativo']);


        Permission::create(['name' => 'veterinarios.index', 'description' => 'ver listado de veterinarios']);
        Permission::create(['name' => 'veterinarios.create', 'description' => 'crear veterinario']);
        Permission::create(['name' => 'veterinarios.edit', 'description' => 'editar veterinario']);

        Permission::create(['name' => 'clientes.index', 'description' => 'ver listado de clientes'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'clientes.create', 'description' => 'crear cliente'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'clientes.edit', 'description' => 'editar cliente'])->syncRoles([$recepcion]);

        Permission::create(['name' => 'mascotas.index', 'description' => 'ver listado de mascotas'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'mascotas.create', 'description' => 'crear mascota'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'mascotas.edit', 'description' => 'editar mascota'])->syncRoles([$vet, $recepcion]);

        Permission::create(['name' => 'vacunas.index', 'description' => 'ver listado de vacunas'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'vacunas.create', 'description' => 'crear vacunas'])->syncRoles([ $vet]);
        Permission::create(['name' => 'vacunas.edit', 'description' => 'editar vacunas'])->syncRoles([$vet]);
        Permission::create(['name' => 'vacunas.destroy', 'description' => 'eliminar vacunas'])->syncRoles([ $vet]);

        Permission::create(['name' => 'cirugias.index', 'description' => 'ver listado de cirugias'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'cirugias.create', 'description' => 'crear cirugias'])->syncRoles([ $vet]);
        Permission::create(['name' => 'cirugias.edit', 'description' => 'editar cirugias'])->syncRoles([$vet]);
        Permission::create(['name' => 'cirugias.destroy', 'description' => 'eliminar cirugias'])->syncRoles([ $vet]);

        Permission::create(['name' => 'enfermedades.index', 'description' => 'ver listado de enfermedades'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'enfermedades.create', 'description' => 'crear enfermerdades'])->syncRoles([ $vet]);
        Permission::create(['name' => 'enfermedades.edit', 'description' => 'editar enfermedades'])->syncRoles([ $vet]);
        Permission::create(['name' => 'enfermedades.destroy', 'description' => 'eliminar enfermedades'])->syncRoles([ $vet]);

        Permission::create(['name' => 'historiales.index', 'description' => 'ver listado de historiales clinicos'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'historiales.create', 'description' => 'crear historial clinico'])->syncRoles([ $vet]);
        Permission::create(['name' => 'historiales.edit', 'description' => 'editar historial clinico'])->syncRoles([ $vet]);
        Permission::create(['name' => 'historiales.show', 'description' => 'mostrar historial clinico'])->syncRoles([ $vet, $recepcion]);

        Permission::create(['name' => 'servicios.index', 'description' => 'ver listado de servicios'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'servicios.create', 'description' => 'crear servicio']);
        Permission::create(['name' => 'servicios.edit', 'description' => 'editar servicio']);
        Permission::create(['name' => 'servicios.destroy', 'description' => 'eliminar servicio']);

        Permission::create(['name' => 'cita-servicio.index', 'description' => 'ver listado de solicitudes de servicio'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'cita-servicio.create', 'description' => 'crear solicitud de servicio'])->syncRoles([ $vet, $recepcion]);
        
        Permission::create(['name' => 'turnos.index', 'description' => 'ver listado de turnos'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.create', 'description' => 'crear turno'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.edit', 'description' => 'editar turno'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.destroy', 'description' => 'eliminar turno'])->syncRoles([ $recepcion]);

        Permission::create(['name' => 'bitacora', 'description' => 'ver bitacora']);

        Permission::create(['name' => 'roles.index', 'description' => 'ver listado de roles']);
        Permission::create(['name' => 'roles.create', 'description' => 'crear rol']);
        Permission::create(['name' => 'roles.edit', 'description' => 'editar rol']);
        Permission::create(['name' => 'roles.destroy', 'description' => 'eliminar rol']);

        Permission::create(['name' => 'proveedores.index', 'description' => 'ver listado de proveedores'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.create', 'description' => 'crear proveedores'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.edit', 'description' => 'editar proveedores'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.destroy', 'description' => 'eliminar proveedores']);

        Permission::create(['name' => 'productos.index', 'description' => 'ver listado de productos'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.create', 'description' => 'crear productos'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.comprar', 'description' => 'registrar compra de productos']);
        Permission::create(['name' => 'productos.vender', 'description' => 'registrar venta de productos']);
        Permission::create(['name' => 'productos.edit', 'description' => 'editar productos'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.destroy', 'description' => 'eliminar productos']);

        Permission::create(['name' => 'categorias.index', 'description' => 'ver listado de categorias'])->syncRoles([ $supervisor]);
        Permission::create(['name' => 'categorias.create', 'description' => 'crear categoria'])->syncRoles([ $supervisor]);;
        Permission::create(['name' => 'categorias.edit', 'description' => 'editar categoria'])->syncRoles([ $supervisor]);;
        Permission::create(['name' => 'categorias.destroy', 'description' => 'eliminar categoria'])->syncRoles([ $supervisor]);;



    }
}
