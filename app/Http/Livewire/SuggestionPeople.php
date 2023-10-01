<?php

namespace App\Http\Livewire;

use Throwable;
use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class SuggestionPeople extends Component
{
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
    public function render()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('livewire.suggestion-people', compact('users'));
    }
}
