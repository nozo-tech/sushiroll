<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Channel extends Model
{
    use HasFactory, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'handle',
        'name',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'livestream_key',
        'user_id',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * Get the user that owns the channel.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the groups this channel belongs to.
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * Get the rolls of this channel.
     */
    public function rolls(): HasMany
    {
        return $this->hasMany(Roll::class);
    }

    /**
     * Get the livestreams of this channel.
     */
    public function lives(): HasMany
    {
        return $this->hasMany(Live::class);
    }

    /**
     * Get the threads of this channel.
     */
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Generate a unique livestream key.
     *
     * This method generates a unique livestream key for a channel.
     *
     * @return string The generated livestream key
     */
    public static function generateLivestreamKey(): string
    {
        do { // Make sure the key is unique
            $livestream_key = 'livekey_' . bin2hex(random_bytes(8)) . '_' . Str::random(32);
        } while (static::where('livestream_key', $livestream_key)->exists());

        return $livestream_key;
    }
}
