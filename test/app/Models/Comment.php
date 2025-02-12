<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_item_id',
        'user_id',
        'content',
    ];

    public function newsItem()
    {
        return $this->belongsTo(NewsItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}