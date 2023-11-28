<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Venta::class;
    public function definition()
    {
        $fecha = $this->faker->dateTimeBetween('2021-05-01', '2023-11-26')->format('Y-m-d');
        $idClienteRandom = Cliente::inRandomOrder()->first()->id;
        return [
            'fecha' => $fecha,
            'concepto' => 'producto',
            'total' => 0,
            'id_cliente' => $idClienteRandom,
            'id_administrativo' => $this->faker->numberBetween(3,5), // Ajusta esto según tu estructura de administrativos
        ];
    }

    public function customConcepto(String $valor)
    {
        return $this->state([
            'concepto' => $valor,
        ]);
    }
}
