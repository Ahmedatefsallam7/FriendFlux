<?php

namespace App\Http\Livewire;

use Throwable;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\SavedPost;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class ExplorePosts extends Component
{
    protected $listeners = [
        "addNewPost" => '$refresh',
        'addLike' => '$refresh',
        // 'load-more' => 'LoadMore',
    ];
    public $post;
    public $comment;


    public function render()
    {
        return view('livewire.explore-posts');
    }


    function addLike($id)
    {
        DB::beginTransaction();
        try {
            $postLike = Post::findOrFail($id);
            $postLike->likes()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);
            $postLike->update([
                'total_Likes' => $postLike->total_Likes + 1,
            ]);
            if ($postLike->user->id == auth()->id()) {
                Notification::create([
                    'type' => 'friend request accepted ',
                    'user_id' => auth()->id(),
                    'message' => auth()->user()->user_name . " like on his post",
                    'url' => '#',
                ]);
            } else {
                Notification::create([
                    'type' => 'friend request accepted ',
                    'user_id' => auth()->id(),
                    'message' => auth()->user()->user_name . " like on your post",
                    'url' => '#',
                ]);
            }

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
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

        DB::beginTransaction();
        try {
            $postComment = Post::findOrFail($id);
            $postComment->comments()->firstOrCreate([
                'user_id' => auth()->id(),
                'comment' => $this->comment,
            ]);

            $postComment->update([
                'total_Comments' => $postComment->total_Comments + 1,
            ]);

            if ($postComment->user->id == auth()->id()) {
                Notification::create([
                    'type' => 'friend request accepted ',
                    'user_id' => auth()->id(),
                    'message' => auth()->user()->user_name . " commented on his post",
                    'url' => '#',
                ]);
            } else {
                Notification::create([
                    'type' => 'friend request accepted ',
                    'user_id' => auth()->id(),
                    'message' => auth()->user()->user_name . " commented on your post",
                    'url' => '#',
                ]);
            }


            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        $this->emit('addLike');
        $this->comment = '';
    }
}
