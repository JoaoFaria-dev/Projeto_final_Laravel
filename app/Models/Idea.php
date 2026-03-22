<?php

namespace App\Models;

use App\statusIdea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;

    protected $casts = [
        'status' => statusIdea::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
