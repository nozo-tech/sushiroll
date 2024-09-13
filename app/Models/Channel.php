<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory, HasUlids;

    /**
     * Get the rolls of this channel.
     */
    public function rolls(): HasMany
    {
        return $this->hasMany(Roll::class);
    }
}
