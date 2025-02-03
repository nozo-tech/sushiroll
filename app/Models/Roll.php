<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Roll extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'title',
        'description',
        'is_locked',
        'visibility',
    ];
    protected $hidden = ['channel_id', 'deleted_at'];
    protected $with = ['channel'];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
