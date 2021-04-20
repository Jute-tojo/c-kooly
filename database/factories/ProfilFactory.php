<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' =>  $this->faker->firstName,
            'prenom' => $this->faker->lastName,
            'dtn' => $this->faker->date,
            'lieuNais' => $this->faker->address.' '.$this->faker->city,
            'sexe' => $this->faker->randomElement(array('Homme', 'Femme')),
            'adresse' => $this->faker->address,
            'contact' => $this->faker->randomElement(array('033', '034', '032')).$this->faker->numberBetween(1000000, 9000000),
            'fonctionActu' => $this->faker->randomElement(array('Professeur', 'Etudiant', 'Parent'))
        ];
    }
}
