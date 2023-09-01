<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Roll extends Model
{
    use HasFactory;
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content'
    ];

    /**
     * Get the roll comments of this roll.
     */
    public function rollComments(): MorphMany
    {
        return $this->morphMany(RollComment::class, 'roll_commentable');
    }

    /**
     * Get the roll type of this roll.
     */
    public function rollType(): BelongsTo
    {
        return $this->belongsTo(RollType::class);
    }
}
