<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        // Voeg testgebruikers toe als ze nog niet bestaan
        $user1 = User::firstOrCreate(['email' => 'test@example.com'], [
            'name' => 'Test User',
            'password' => bcrypt('password')
        ]);
        
        $user2 = User::firstOrCreate(['email' => 'admin@domain.com'], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        // Voeg berichten toe voor FAQ
        Message::create([
            'content' => 'Wat is Laravel?',
            'category' => 'Algemeen',
            'answer' => 'Laravel is een PHP framework.',
            'user_id' => $user1->id, 
            'answer_user_id' => $user2->id, 
        ]);

        Message::create([
            'content' => 'Hoe kan ik een database migratie uitvoeren?',
            'category' => 'Technisch',
            'answer' => 'Je kunt de php artisan migrate opdracht gebruiken.',
            'user_id' => $user1->id,
            'answer_user_id' => $user2->id,
        ]);

        Message::create([
            'content' => 'Wat is de standaard PHP versie?',
            'category' => 'Algemeen',
            'answer' => 'De standaard versie is afhankelijk van je PHP installatie.',
            'user_id' => $user2->id,
            'answer_user_id' => $user1->id,
        ]);
        
    }
}

