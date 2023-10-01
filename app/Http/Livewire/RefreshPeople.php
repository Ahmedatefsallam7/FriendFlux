<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Throwable;

class RefreshPeople extends Component
{
    public $user;
    protected $listeners = [
        'sendFriendRequest' => '$refresh',
    ];

    function addFriend($id)
    {
        DB::beginTransaction();
        try {

            Friend::create([
                'user_id' => auth()->id(),
                'friend_id' => $id,
                'status' => 'pending',
            ]);

            Notification::create([
                'type' => 'friend_request',
                'user_id' => auth()->id(),
                'message' => auth()->user()->first_name . ' ' . auth()->user()->last_name . " send you friend request",
                'url' => '#',
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        $this->emit("sendFriendRequest");
    }

    function rejectFriend($id)
    {
        Friend::where([
            'user_id' => auth()->id(),
            'friend_id' => $id,
        ]);

        $this->emit("sendFriendRequest");
    }

    function cancelRequest($id)
    {
        return Friend::where([
            'user_id' => auth()->id(),
            'friend_id' => $id,
        ])->delete();

        $this->emit("sendFriendRequest");
    }

    function removeFriend($id)
    {
        return Friend::where('user_id', $id)
            ->orWhere('friend_id', $id)
            ->delete();

        $this->emit("sendFriendRequest");
    }

    function acceptRequest($id)
    {
        DB::beginTransaction();
        try {
            Friend::where([
                'user_id' => $id,
                'friend_id' => auth()->id(),
            ])->update([
                'status' => 'accepted',
            ]);
            Notification::create([
                'type' => 'friend request accepted ',
                'user_id' => auth()->id(),
                'message' => auth()->user()->user_name . " accept your friend request",
                'url' => '#',
            ]);

            $this->emit("sendFriendRequest");
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.refresh-people');
    }
}
