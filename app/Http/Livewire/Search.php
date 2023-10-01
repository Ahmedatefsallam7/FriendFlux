<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search;

    function mount()
    {
        $this->search = request()->input('query');
    }
    public function render()
    {
        $posts = Post::where('content', 'like', "%{$this->search}%")->get();
        return view('livewire.search', compact('posts'));
    }
}
