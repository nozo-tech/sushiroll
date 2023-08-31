<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function roll_comments(): HasMany
    {
        return $this->hasMany(RollComment::class);
    }

    /**
     * Get the roll type of this roll.
     */
    public function roll_type(): BelongsTo
    {
        return $this->belongsTo(RollType::class);
    }
}
