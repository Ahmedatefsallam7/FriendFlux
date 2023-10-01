<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'icon',
        'thumbnail',
        "description",
        'location',
        'type',
        'members',

    ];


    /**
     * Get the user that owns the Page
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all the posts for the Page
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    function pageLikes()
    {
        return $this->hasMany(PageLike::class);
    }

    function is_follower()
    {
        return PageLike::where(['user_id' => auth()->id(), 'page_id' => $this->id])->first();
    }

    function isAuthor()
    {
        return Page::where(['user_id' => auth()->id(), 'id' => $this->id])->first();
    }
}
