<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'testuser',
            'email' => 'user@ehb.com',
        ]);

        // Voeg een standaard admin gebruiker toe
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'), // Zorg ervoor dat je een veilig wachtwoord gebruikt
            'is_admin' => true, // Voeg een veld toe om de admin status aan te geven
        ]);

        // Voer andere seeders uit
        $this->call([
            MessageSeeder::class,
            NewsSeeder::class,
            ActivitySeeder::class,
        ]);
    }
}
