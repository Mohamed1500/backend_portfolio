<?php


namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
            'answer' => $this->faker->optional()->sentence,
            'is_visible' => true,
            'category' => $this->faker->randomElement(['Algemeen', 'Technisch', 'Overig']),
            'user_id' => User::factory(), // Koppelt een gebruiker aan het bericht
        ];
    }
}

