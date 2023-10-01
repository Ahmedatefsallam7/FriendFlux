<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Notification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateGroup extends Component
{
    use WithFileUploads;

    public $name;
    public $icon;
    public $thumbnail;
    public $location;
    public $type;
    public $description;

    function store()
    {
        $this->validate([

            'name' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $user = User::find(auth()->id());

        DB::beginTransaction();
        try {

            $group = Group::create([
                'uuid' => Str::uuid(),
                'user_id' => auth()->id(),
                'name' => $this->name,
                'icon' => $this->icon,
                'thumbnail' => $this->thumbnail,
                "description" => $this->description,
                'location' => $this->location ??  "Cairo",
                'type' => $this->type ?? 'public',
            ]);

            Notification::create([
                'type' => 'Create new group',
                'user_id' => $user->id,
                'message' => $user->first_name . " " . $user->last_name . ' create new group',
                'url' => '#',
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        if ($this->icon || $this->thumbnail) {
            $icon =  $this->icon->store('groups/icons', 'public');
            $thumb =  $this->thumbnail ? $this->thumbnail->store('groups/thumbnails', 'public')
                : $this->icon->store('groups/thumbnails', 'public');
            $group->update([
                'icon' => $icon,
                'thumbnail' => $thumb ,
            ]);
        }

        // session()->flash('addNewPage', 'Your group created successfully');
        $this->reset();
        $this->emit('newPage');
        return to_route('groups');
    }

    public function render()
    {
        return view('livewire.create-group');
    }
}
