<?php

namespace App\Http\Livewire;

use App\Models\Story;
use Livewire\Component;
use Livewire\WithFileUploads;

class Stories extends Component
{
    use WithFileUploads;
    public $images;
    protected $listeners = ["addStory" => '$refresh'];

    public function updatedImages()
    {
        // $this->validate([
        //     'images' => "required|image|mimes:png,jpg,jpeg",
        // ]);

        $images = [];
        foreach ($this->images as $image) {
            $images[] = $image->store('stories', 'public');
        }

        Story::create([
            'user_id' => auth()->id(),
            'story' => json_encode($images),
        ]);
        $this->emit('addStory');
        return redirect()->back();
    }

    public function render()
    {
        $stories = Story::where('created_at', '>=', now()->subDay())
        ->latest()
        ->get()
        ->unique('user_id');
        $this->emit('addStory');
        return view('livewire.stories', compact('stories'));
    }
}