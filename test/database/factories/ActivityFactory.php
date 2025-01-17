<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Willekeurige zin voor de titel
            'description' => $this->faker->paragraph, // Willekeurige tekst voor de beschrijving
            'image' => 'images_backend/' . $this->faker->image('public/images_backend', 640, 480, null, false), // Willekeurige afbeelding
            'date' => $this->faker->dateTimeBetween('now', '+3 months'), // Willekeurige datum binnen de komende 3 maanden
            'time' => $this->faker->time(), // Willekeurige tijd
            'location' => $this->faker->address, // Willekeurig adres
            'cost' => $this->faker->randomElement(['Gratis', '€10', '€20']), // Willekeurige prijs
            'requirements' => $this->faker->words(3, true), // Willekeurige vereisten
        ];
    }
}
