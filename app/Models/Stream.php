<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'video_id',
        'live_chat_id',
        'title',
        'status',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
