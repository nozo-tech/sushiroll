<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Comment extends Model
{
    use HasFactory, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'user_id',
        'commentable_id',
        'commentable_type',
    ];

    /**
     * The relationships that should always be loaded.
     */
    protected $with = ['user'];

    /**
     * Get the user that published the comment.
     */
    public function user(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the parent commentable model (roll or comment).
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the comments of this comment.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
