<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\SavedPost as ModelsSavedPost;
use Livewire\Component;

class SavedPost extends Component
{

    function savePost($uuid)
    {
        $post = Post::where('uuid', $uuid)->first();
        $savedPost = \App\Models\SavedPost::where([
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ])->first();

        if ($savedPost) {
            return redirect('/')->with(
                'save',
                "You saved this post before"
            );
        } else {

            \App\Models\SavedPost::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);

            return redirect('/')->with(
                'save',
                "Post saved successfully"
            );
        }
    }
    public function render()
    {
        $posts = ModelsSavedPost::latest()->get();
        return view('livewire.saved-post', compact('posts'));
    }
}
