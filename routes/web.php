<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CirugiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleHistorialController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\NotaIngresoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\VentaProductoController;
use App\Http\Controllers\VentaServicioController;
use App\Http\Controllers\VeterinarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class,'index']);

Route::get('/datos', function () {
    return view('datos');
})->name('datos');

Route::get('/historialClinico', function () {
    return view('historialClinico');
})->name('historialClinico');

Route::get('/servicio', function () {
    return view('servicio');
})->name('servicio');

Route::get('/petshop', function () {
    return view('petshop');
})->name('petshop');


Route::resource('usuarios', UsuarioController::class);


// PAQUETE DATOS

Route::get('administrativos/datas/{id}', [AdministrativoController::class, 'datas']);
Route::resource('administrativos', AdministrativoController::class);

Route::get('clientes/datas/{id}', [ClienteController::class, 'datas']);
Route::resource('clientes', ClienteController::class);

Route::get('veterinarios/datas/{id}', [VeterinarioController::class, 'datas']);
Route::resource('veterinarios', VeterinarioController::class);

Route::get('mascotas/datas/{id}', [MascotaController::class, 'datas'])->name('mascotas.datas');
Route::get('mascotas/my', [MascotaController::class, 'myPets'])->name('mascotas.my');
Route::resource('mascotas', MascotaController::class);

// PAQUETE HISTORIAL CLINICO

Route::get('vacunas/datas/{id}', [VacunaController::class, 'datas']);
Route::resource('vacunas', VacunaController::class);

Route::get('cirugias/datas/{id}', [CirugiaController::class, 'datas']);
Route::resource('cirugias', CirugiaController::class);

Route::get('enfermedades/datas/{id}', [EnfermedadController::class, 'datas']);
Route::resource('enfermedades', EnfermedadController::class);

Route::get('historiales/datas/{id}', [HistorialClinicoController::class, 'datas']);
Route::resource('historiales', HistorialClinicoController::class);
Route::get('historiales/pdf/{id}', [HistorialClinicoController::class,'pdf'])->name('historiales.pdf');

Route::resource('diagnosticos', DetalleHistorialController::class);

// PAQUETE SERVICIOS

Route::get('servicios/datas/{id}', [ServicioController::class, 'datas']);
Route::resource('servicios', ServicioController::class);

Route::get('ventas-servicios/datas/{id}', [VentaServicioController::class, 'datas']);
Route::resource('ventas-servicios', VentaServicioController::class);
Route::get('ventas-servicios/pdf/{id}', [VentaServicioController::class,'pdf'])->name('ventas-servicios.pdf');


// PAQUETE PETSHOP

Route::get('categorias/datas/{id}', [CategoriaController::class, 'datas']);
Route::resource('categorias', CategoriaController::class);

Route::get('proveedores/datas/{id}', [ProveedorController::class, 'datas']);
Route::resource('proveedores', ProveedorController::class);

Route::get('productos/datas/{id}', [ProductoController::class, 'datas']);
Route::post('productos/comprar', [ProductoController::class, 'comprar'])->name('productos.comprar');
Route::post('productos/vender', [ProductoController::class, 'vender'])->name('productos.vender');
Route::resource('productos', ProductoController::class);

Route::get('compras/datas/{id}', [NotaIngresoController::class, 'datas']);
Route::resource('compras', NotaIngresoController::class);

Route::resource('ventas', VentaProductoController::class);
Route::get('ventas/pdf/{id}', [VentaProductoController::class,'pdf'])->name('ventas.pdf');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});

require __DIR__.'/auth.php';
