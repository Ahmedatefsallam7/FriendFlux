<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreatePage extends Component
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

            $page = $user->pages()->create([
                'uuid' => Str::uuid(),
                'name' => $this->name,
                'icon' => $this->icon,
                'thumbnail' => $this->thumbnail,
                "description" => $this->description,
                'location' => $this->location,
                'type' => $this->type ?? 'public',
            ]);

            Notification::create([
                'type'=>'Create new page',
                'user_id'=>$user->id,
                'message'=>$user->first_name." ".$user->last_name.' create new page',
                'url'=>'#',
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        if ($this->icon || $this->thumbnail) {
            $icon =  $this->icon->store('pages/icons', 'public');
            $thumb =  $this->thumbnail ? $this->thumbnail->store('pages/thumbnails', 'public')
                : $this->icon->store('pages/thumbnails', 'public');
            $page->update([
                'icon' => $icon,
                'thumbnail' => $thumb,
            ]);
        }

        // session()->flash('addNewPage', 'Your page created successfully');
        $this->emit('newPage',$page->id);
        $this->reset();
        return to_route('pages');
    }
    public function render()
    {
        return view('livewire.create-page');
    }
}
