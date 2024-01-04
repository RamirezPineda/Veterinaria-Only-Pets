<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mascota::class;
    public function definition(): array
    {
        // $razasPerros = [
        //     'Labrador Retriever',
        //     'Pitbull',
        //     'Bulldog', 'Boxer', 'Doberman', 'Husky', 'Mastil',
        //     'Golden Retriever', 'Poodle', 'Beagle',
        //     'Dachshund', 'Chihuahua', 'Pug', 'Caniche', 'Pastror Aleman',
        //     'Rottweiler', 'Bull Terrier', 'Yorkshire Terrier', 'San Bernardo',
        //      'Gran Danes', 'Pomerania', 'Pequinés','Pinscher', 'Pointer',
        // ];

        $razasPerros = [
            'Labrador Retriever',
            'Pitbull',
            'Bulldog', 'Boxer', 'Doberman', 'Husky', 'Mastil',
            'Golden Retriever', 'Poodle', 'Beagle',
            'Dachshund', 'Chihuahua', 'Pug', 'Caniche', 'Pastror Aleman',
            'Rottweiler', 'Bull Terrier', 'Yorkshire Terrier', 'San Bernardo',
            'Gran Danes', 'Pomerania', 'Pequinés', 'Pinscher', 'Pointer',
            'Shih Tzu', 'Shiba Inu', 'Border Collie', 'Bichón Frisé', 'Cocker Spaniel',
            'Dálmata', 'Galgo Español', 'Akita', 'Collie', 'Setter Irlandés',
            'Cavalier King Charles Spaniel', 'Basset Hound', 'Rhodesian Ridgeback',
            'Whippet', 'Terrier Escocés', 'Shetland Sheepdog', 'Bóxer Alemán',
            'Terranova', 'Borzoi', 'Alaskan Malamute', 'Staffordshire Bull Terrier',
            'Schnauzer', 'Weimaraner', 'Vizsla', 'Spinone Italiano', 'Cane Corso',
            'Leonberger', 'Boyero de Berna', 'Cirneco del Etna', 'Setter Inglés',
            'Mastín Tibetano', 'Teckel', 'Airedale Terrier', 'Dogo Argentino',
            'Chow Chow', 'Havanese', 'Setter Gordon', 'Komondor', 'Saluki',
            'Samoyedo', 'Barbet', 'Briard', 'Komondor', 'Perro de Montaña de los Pirineos',
            'Podenco Ibicenco', 'Perro de Aguas Español', 'Cirneco del Etna',
            'Dogo de Burdeos', 'Corgi Galés Pembroke', 'Tosa Inu', 'Cane Corso',
            'Cesky Terrier', 'Deerhound Escocés', 'Sealyham Terrier', 'Fox Terrier',
            'Bulldog Francés', 'Scottish Terrier', 'West Highland White Terrier', 'Akita Inu',
            'Bichon Maltés', 'Pastor Belga', 'Bichón Havanés', 'Irish Wolfhound',
            'Basset Fauve de Bretagne', 'Spaniel Japonés', 'Chinook', 'Drever',
            'Harrier', 'Kai Ken', 'Norwich Terrier', 'Otterhound', 'Polish Lowland Sheepdog',
            'Sloughi', 'Tibetan Spaniel', 'Xoloitzcuintli', 'Azawakh', 'Bolognese',
            'Harrier', 'Kooikerhondje', 'Lowchen', 'Lundehund', 'Mudi',
            'Norrbottenspets', 'Pharaoh Hound', 'Podenco Canario', 'Portuguese Water Dog',
            'Dingo', 
        ];        
              
        

       
        return [
            'nombre' => $this->faker->unique()->word,
            'raza' => $this->faker->randomElement($razasPerros),
            'fecha_nacimiento' => $this->faker->date,
            'especie' => "perro",
            'descripcion' => $this->faker->sentence,
            'sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
        ];
    }
}
