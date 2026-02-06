<?php

namespace Database\Factories;

use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    protected $model = Offre::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->jobTitle(),
            'place'       => $this->faker->city(),
            'type_offer'  => $this->faker->randomElement(['cdi','cdd','stage','freelance','alternance']),
            'description' => $this->faker->paragraphs(3, true),
            'image_offer' => 'C:\Users\youco\Desktop\BACK-END\Espace-d’Emploi\storage\app\public\offres\dUPgUIVMIP3uLNFX75XqKAldLfYK4mgqZJZ09EJo.jpg',
        ];
    }
}
