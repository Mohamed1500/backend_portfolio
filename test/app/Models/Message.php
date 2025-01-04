<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'content',
        'answer', // Voeg dit veld toe
        'is_visible', // Voeg dit veld toe als je het gebruikt om berichten zichtbaar te maken
    ];

    // Voeg een relatie toe met de User als dat nodig is
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}