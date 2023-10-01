<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Group;
use App\Models\SavedPost;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable /*implements MustVerifyEmail*/
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     *
     */

    protected $fillable = [
        "uuid",
        "first_name",
        'last_name',
        'user_name',
        'email',
        'mobile',
        'password',
        'mobile_verification_code',
        'email_verified_at',
        'mobile_verified_at',
        'description',
        'thumbnail',
        'profile',
        'gender',
        'relationship',
        'location',
        'address',
        'is_private',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "remember_token",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function savedPosts()
    {
        return $this->hasMany(SavedPost::class);
    }

    function pageLikes()
    {
        return $this->hasMany(PageLike::class);
    }

    function pages()
    {
        return $this->hasMany(Page::class);
    }

    function groups()
    {
        return $this->hasMany(Group::class);
    }

    function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    function likes()
    {
        return $this->hasMany(Like::class);
    }

    function friends()
    {
        return $this->hasMany(Friend::class);
    }

    function is_friend()
    {
        return Friend::where('user_id', $this->id)
            ->orWhere('friend_id', $this->id)
            ->first()->status ?? "";
    }

    function is_sender()
    {
        return Friend::where(['user_id' => auth()->id()])
            ->first()->status ?? "";
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
