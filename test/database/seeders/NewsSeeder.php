<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Voeg nieuwsitems toe die te maken hebben met een jeugdbeweging

        // Nieuwsitem 1: Nieuwe activiteit
        NewsItem::factory()->create([
            'title' => 'Nieuwe activiteit: Boswandeling',
            'content' => 'Kom mee wandelen door het bos en ontdek de natuur met de groep! Vergeet niet je wandelschoenen mee te nemen. De activiteit vindt plaats op zaterdag om 10:00 uur.',
            'published_at' => now(),
            'user_id' => 1, // Koppelen aan de gebruiker met id 1 (de testgebruiker)
            'image' => 'https://img.nieuwsblad.be/I-_WEIdw5Q1Cd9o-fni58yDMhFg=/0x0:3002x1996/960x640/smart/https%3A%2F%2Fstatic.nieuwsblad.be%2FAssets%2FImages_Upload%2F2020%2F10%2F29%2Fc77cae0c-19f5-11eb-9a87-6428dd93635b.jpg', // Voeg een afbeelding toe
        ]);

        // Nieuwsitem 2: Uitleg over een nieuwe activiteit
        NewsItem::factory()->create([
            'title' => 'Ploggen: de nieuwe trend in onze jeugdbeweging',
            'content' => 'Wat is ploggen? Het is een nieuwe activiteit waarbij we joggen en tegelijkertijd zwerfvuil oprapen. Doe mee en help onze natuur schoon te houden!',
            'published_at' => now()->subDays(3),
            'user_id' => 2, // Koppelen aan een andere gebruiker
        ]);

        // Nieuwsitem 3: Inschrijving voor zomerkamp geopend
        NewsItem::factory()->create([
            'title' => 'Inschrijving zomerkamp 2025 geopend!',
            'content' => 'De inschrijvingen voor het zomerkamp van 2025 zijn geopend. We hebben een geweldige line-up van activiteiten, waaronder mountainbiken, zwemmen, en creatieve workshops. Schrijf je snel in!',
            'published_at' => now()->subWeeks(2),
            'user_id' => 1, // Koppelen aan de testgebruiker
        ]);

        // Nieuwsitem 4: Nieuwe leiding aangesteld
        NewsItem::factory()->create([
            'title' => 'Nieuwe leiding voor de jongste groep!',
            'content' => 'We verwelkomen onze nieuwe leiding, Sarah en Tom, die de jongste groep van de jeugdbeweging gaan begeleiden. We zijn erg blij met hun komst!',
            'published_at' => now()->subMonth(),
            'user_id' => 2, // Koppelen aan de admin
        ]);
    }
}
