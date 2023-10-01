<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ExploreGroupPosts extends Component
{
    public $post;
    public $comment;

    protected $listeners = [
        "addNewGroupPost" => '$refresh',
        'addLike' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.explore-group-posts');
    }



    function addLike($id)
    {
        $postLike = Post::findOrFail($id);

        $postLike->likes()->firstOrCreate([
            'user_id' => auth()->id(),
        ]);
        $postLike->update([
            'total_Likes' => $postLike->total_Likes + 1,
        ]);

        $this->emit('addLike');
    }

    function disLike($id)
    {
        $postLike = Post::findOrFail($id);

        $postLike->likes()->delete();
        $postLike->update([
            'total_Likes' => $postLike->total_Likes - 1,
        ]);

        $this->emit('addLike');
    }

    function addComment($id)
    {
        $this->validate([
            'comment' => 'required|string',
        ]);

        $postComment = Post::findOrFail($id);

        $postComment->comments()->firstOrCreate([
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);

        $postComment->update([
            'total_Comments' => $postComment->total_Comments + 1,
        ]);
        $this->emit('addLike');
        $this->comment = '';
    }
}