<?php

namespace App\Models;

use App\statusIdea;
use Database\Factories\IdeaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Idea extends Model
{
    /** @use HasFactory<IdeaFactory> */
    use HasFactory;

    protected $casts = [
        'status' => statusIdea::class,
        'links' => 'array',
    ];

    protected $attributes = [
        'status' => statusIdea::PENDING->value,
    ];

    public static function statusCount(User $user): Collection
    {

        // select status, count(*) from ideas group by status

        $Contador = $user->ideas()
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return collect(statusIdea::cases())
            ->mapWithKeys(fn ($status) => [
                $status->value => $Contador->get($status->value, 0),
            ])
            ->put('all', $user->ideas()->count());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
