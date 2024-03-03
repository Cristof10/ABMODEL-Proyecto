<?php

namespace Database\Factories;

use App\Models\Postura;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosturaFactory extends Factory
{
    /**
     * Define the model for the factory.
     *
     * @return string
     */
    public function model(): string
    {
        return Postura::class;
    }

    /**
     * Define the definitions for the factory.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'terminoEnglish' => $this->faker->word,
            'terminoSanskrit' => $this->faker->word,
            'terminoSpanish' => $this->faker->word,
            // Add more definitions for other fields in your Postura model
        ];
    }
}
