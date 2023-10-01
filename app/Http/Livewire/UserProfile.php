<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\PostMedia;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserProfile extends Component
{
    public $uuid;
    protected $listeners = [
        'addNewPost' => '$refresh',
        'sendFriendRequest' => '$refresh',
    ];

    function mount($uuid)
    {
        $this->uuid = $uuid;
    }

    function editProfile($id)
    {
        return view('profile.edit');
    }

    function addFriend($id)
    {
        return DB::transaction(function () use ($id) {
            $user = auth()->user();

            Friend::create([
                'user_id' => $user->id,
                'friend_id' => $id,
                'status' => 'pending',
            ]);

            Notification::create([
                'type' => 'friend_request',
                'user_id' => $user->id,
                'message' => "{$user->first_name} {$user->last_name} sent you a friend request",
                'url' => '#',
            ]);

            $this->emit('sendFriendRequest');
        });
    }

    function cancelRequest($id)
    {
        Friend::where([
            'user_id' => auth()->id(),
            'friend_id' => $id,
        ])->delete();
        return $this->emit('sendFriendRequest');
    }

    function removeFriend($id)
    {
        Friend::where('user_id', $id)
            ->orWhere('friend_id', $id)
            ->delete();
        return $this->emit('sendFriendRequest');
    }

    function acceptRequest($id)
    {
        return DB::transaction(function () use ($id) {
            $authenticatedUser = auth()->user();
            $friendRequest = Friend::where([
                'user_id' => $id,
                'friend_id' => $authenticatedUser->id,
            ])->first();

            if ($friendRequest) {
                $friendRequest->update(['status' => 'accepted']);

                Notification::create([
                    'type' => 'friend_request_accepted',
                    'user_id' => $authenticatedUser->id,
                    'message' => "{$authenticatedUser->user_name} accepted your friend request",
                    'url' => '#',
                ]);

                $this->emit('sendFriendRequest');
            }
        });
    }


    public function render()
    {
        $user = User::where('uuid', $this->uuid)->firstOrFail();

        $posts = $user->posts()
            ->latest()
            ->get();

        $images = PostMedia::where('file_type', 'image')
            ->whereIn('post_id', $posts->pluck('id'))
            ->latest()
            ->get();

        $sender = $user->friends()->where('user_id', $user->id)->first();

        return view('livewire.user-profile', compact('user', 'sender', 'posts', 'images'));
    }
}
