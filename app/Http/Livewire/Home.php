<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Post;
use App\Models\Group;
use App\Models\Friend;
use Livewire\Component;
use App\Models\SavedPost;

class Home extends Component
{
    // public $paginator=10;

    protected $listeners = [
        'addNewPost' => '$refresh',
        'sendFriendRequest' => '$refresh',
        'addStory' => '$refresh',
        'newPage' => '$refresh',
    ];


    function savePost($uuid)
    {
        $post = Post::where('uuid', $uuid)->first();
        $savedPost = SavedPost::where([
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ])->first();

        if ($savedPost) {
            return redirect('/')->with(
                'save',
                "You saved this post before"
            );
        } else {

            SavedPost::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);

            return back()->with(
                'save',
                "Post saved successfully"
            );
        }
    }


    public function render()
    {
        $posts = Post::with('user', 'postMedia')->latest()->get();

        $pages = Page::where('user_id', '!=', auth()->id())
            ->inRandomOrder()->limit(6)->get();

        $groups = Group::where('user_id', '!=', auth()->id())
            ->inRandomOrder()->limit(6)->get();

        return view('livewire.home', compact(['posts', 'pages', 'groups']));
    }
}
