<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use App\Models\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Throwable;

class ShowFriendRequest extends Component
{
    function acceptFriend($id)
    {
        $user = User::whereId($id)->first();
        DB::beginTransaction();
        try {
            $req = Friend::where([
                'user_id' => $id,
                'friend_id' => auth()->id(),
            ])->first();

            $req->update([
                'status' => 'accepted',
            ]);

            Notification::create([
                'type' => 'friend request accepted ',
                'user_id' => auth()->id(),
                'message' => auth()->user()->user_name . ' accept your friend request',
                'url' => '#',
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollback();
            throw $th;
        }

        session()->flash('accept', 'you are friend now to ' . $user->first_name . ' ' . $user->last_name);

        $this->emit('acceptFriendRequest');
    }
    function rejectFriend($id)
    {
        $user = User::findOrFail($id);
        $user->friends()->delete();

        $this->emit('rejectFriendRequest');
    }
    public function render()
    {
        $friendRequests = Friend::whereNotIn('user_id', [auth()->id()])
            ->where('status', 'pending')
            ->latest()
            ->get();
        return view('livewire.show-friend-request', compact('friendRequests'));
    }
}
