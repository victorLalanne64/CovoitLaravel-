<?php
namespace Database\Factories;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoitureFactory extends Factory
{
    protected $model = Voiture::class;

    public function definition(): array
    {
        return [
            'modele' => $this->faker->word(),
            'nb_places' => $this->faker->numberBetween(2, 5),
        ];
    }
}