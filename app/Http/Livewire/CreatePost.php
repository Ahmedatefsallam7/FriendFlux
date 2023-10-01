<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class CreatePost extends Component
{
    use WithFileUploads;

    public $message;
    public $images;
    public $video;
    // protected $listeners=['addNewPost'=>'$refresh'];

    public function render()
    {
        return view('livewire.create-post');
    }

    function storePost()
    {
        $this->validate([
            'message' => 'required|string',
        ]);
        //  if post has images or videos
        DB::beginTransaction();
        try {

            $post = auth()->user()->posts()->create([
                'uuid' => Str::uuid(),
                'content' => $this->message,
            ]);
            Notification::create([
                'type' => 'post comment',
                'user_id' => $post->user_id,
                'message' => auth()->user()->first_name . ' ' . auth()->user()->last_name . " have a new post",
                'url' => '#',
            ]);

            $images = "";
            if ($this->images) {
                $images = $this->images->store('posts/images', 'public');
                PostMedia::create([
                    'post_id' => $post->id,
                    'file_type' => 'image',
                    'file' => $images,
                    'position' => 'general',
                ]);
            }


            $video_name = "";
            if ($this->video) {
                $video_name = $this->video->store('posts/video', 'public');

                PostMedia::create([
                    'post_id' => $post->id,
                    'file_type' => 'video',
                    'file' => $video_name,
                    'position' => 'general',
                ]);
            }



            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        $this->emit("addNewPost");
        session()->flash('notify', 'Your post has been published');
        $this->message = '';
    }
}
