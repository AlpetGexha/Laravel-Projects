<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug',
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}