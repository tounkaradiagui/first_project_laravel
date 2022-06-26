<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\model;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{

    /**
     * the name of factory's corresponding model.
     *@var string
     */

    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'classe_id' => rand(1,7),
            
        ];
    }
}
