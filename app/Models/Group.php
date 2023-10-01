<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
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
     * Get the user that owns the Group
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    function is_joiner()
    {
        return GroupMember::where('user_id', auth()->id())
            ->where('group_id', $this->id)
            ->first();
    }
}
