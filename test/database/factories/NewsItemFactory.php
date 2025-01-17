<?php

namespace Database\Factories;

use App\Models\NewsItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsItem::class;

    /** 
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Een willekeurige zin als titel
            'content' => $this->faker->paragraph, // Een willekeurig alinea als inhoud
            'published_at' => $this->faker->dateTimeThisYear(), // Willekeurige datum binnen het huidige jaar
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Willekeurige gebruiker
        ];
    }
}
