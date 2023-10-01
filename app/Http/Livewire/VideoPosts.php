<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Throwable;

class VideoPosts extends Component
{
    public $search;
    public $post;
    public $comment;

    function addLike($id)
    {
        $postLike = Post::findOrFail($id);

        DB::beginTransaction();

        try {
            $postLike->likes()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);
            $postLike->update([
                'total_Likes' => $postLike->total_Likes + 1,
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $this->emit('addLike');
    }
    function disLike($id)
    {
        $postLike = Post::findOrFail($id);
        DB::beginTransaction();

        try {
            $postLike->likes()->delete();
            $postLike->update([
                'total_Likes' => $postLike->total_Likes - 1,
            ]);
            DB::commit();
        } catch (Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $this->emit('addLike');
    }

    function addComment($id)
    {
        $this->validate([
            'comment' => 'required|string',
        ]);

        $postComment = Post::findOrFail($id);

        DB::beginTransaction();
        try {
            $postComment->comments()->firstOrCreate([
                'user_id' => auth()->id(),
                'comment' => $this->comment,
            ]);

            $postComment->update([
                'total_Comments' => $postComment->total_Comments + 1,
            ]);
            DB::commit();
        } catch (Throwable $th) {
            DB::rollback();
            throw $th;
        }
        $this->emit('addLike');
        $this->comment = '';
    }
    public function render()
    {
        $postMedia = PostMedia::where('file_type', 'video')->latest()->pluck('post_id');
        $posts = Post::with('user')
            // ->where('content', 'like', '%' . $this->search . '%')
            ->whereIn('id', $postMedia)
            // ->orWhereNull('content')
            ->inRandomOrder()
            ->get();
        return view('livewire.video-posts', compact('posts'));
    }
}
