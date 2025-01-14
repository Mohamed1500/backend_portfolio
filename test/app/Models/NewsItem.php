<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'published_at',
        'user_id',
    ];

    protected $dates = [
        'published_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}