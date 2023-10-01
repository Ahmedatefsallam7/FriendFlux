<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class Peoples extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;
    protected $listeners = [
        'acceptFriendRequest', '$refresh',
        'rejectFriendRequest', '$refresh',
    ];
    public function render()
    {
        $users = User::where('id', '!=', auth()->id())
            //            ->inRandomOrder()
            ->get();
        $this->emit("sendFriendRequest");
        return view('livewire.peoples', compact('users'));
    }
}
