<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use App\Models\Notification;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    function markAllRead()
    {
        $user = User::find(auth()->id());
        return Notification::where('user_id', '!=', $user->id)->update([
            'read_at' => now(),
        ]);
    }

    function markAsRead($id)
    {
        return Notification::whereId($id)->update([
            'read_at' => now(),
        ]);
    }

    public function render()
    {
        $notif = Notification::pluck('user_id');

        $isFriend = Friend::whereIn('user_id', $notif)
            ->whereIn('friend_id', $notif)
            ->where('status', 'accepted')
            ->first();

        $notifications = Notification::where('user_id', '!=', auth()->id())
            ->whereNull('read_at')
            ->where('created_at', '>=', $isFriend->created_at ?? '')
            ->latest()
            ->get();

        return view('livewire.notifications', compact('notifications', 'isFriend'));
    }
}
