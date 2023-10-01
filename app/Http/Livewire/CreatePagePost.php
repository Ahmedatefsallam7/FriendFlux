<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Page;
use App\Models\PageLike;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class CreatePagePost extends Component
{
    use WithFileUploads;

    protected $listeners = ['create-group-post' => '$refresh'];

    public $message;
    public $images;
    public $video;
    public $pagePost;

    public function render()
    {
        $isFollower = PageLike::where(['user_id' => auth()->id(), 'page_id' => $this->pagePost])->first();
        $author = Page::whereId($this->pagePost)
            ->where('user_id', auth()->id())
            ->first();
        return view('livewire.create-page-post', compact('isFollower', 'author'));
    }

    function storePost()
    {
        $this->validate([
            'message' => 'nullable|string',
        ]);
        //  if post has images or videos
        DB::beginTransaction();
        try {
            $post = auth()->user()->posts()->create([
                'uuid' => Str::uuid(),
                'content' => $this->message,
                'is_page_post' => 1,
                'page_id' => $this->pagePost,

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

        session()->flash('notify', 'your  post has been published in the page ');
        $this->emit("addNewGroupPost");
        $this->message = '';
    }
}
