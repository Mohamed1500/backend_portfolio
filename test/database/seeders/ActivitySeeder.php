<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Activity::create([
            'title' => 'Boswandeling',
            'description' => 'Kom mee wandelen door het bos en ontdek de natuur met de groep! Vergeet niet je wandelschoenen mee te nemen.',
            'image' => 'images_backend/boswandeling.jpg',
            'date' => now()->addDays(7), // De datum van de activiteit (1 week later)
            'time' => '10:00 AM',
            'location' => 'Bospark, 1234 AB, Stad',
            'cost' => 'Gratis',
            'requirements' => 'Wandelschoenen, warme kledij',
        ]);

        Activity::create([
            'title' => 'Ploggen: de nieuwe trend',
            'description' => 'Doe mee met ploggen, de activiteit waarbij we joggen en tegelijkertijd zwerfvuil oprapen.',
            'image' => 'images_backend/ploggen.jpg',
            'date' => now()->addDays(14), // De datum van de activiteit (2 weken later)
            'time' => '9:00 AM',
            'location' => 'Parklaan 25, 5678 CD, Stad',
            'cost' => 'Gratis',
            'requirements' => 'Sportieve kledij, handschoenen',
        ]);

        Activity::create([
            'title' => 'Zomerkamp 2025',
            'description' => 'Schrijf je in voor het zomerkamp van 2025. Een avontuurlijke ervaring met mountainbiken, zwemmen, en nog veel meer.',
            'image' => 'images_backend/zomerkamp2025.jpg',
            'date' => now()->addMonths(3), // 3 maanden later
            'time' => 'N.v.t.',
            'location' => 'Zomerkamp locatie, 1234 AB, Stad',
            'cost' => '€150',
            'requirements' => 'Geen specifieke vereisten',
        ]);
    }
}
