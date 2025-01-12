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
        'answer',
        'is_visible',
        'category', 
        'user_id',
        'answer_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answerUser()
    {
        return $this->belongsTo(User::class, 'answer_user_id');
    }
}