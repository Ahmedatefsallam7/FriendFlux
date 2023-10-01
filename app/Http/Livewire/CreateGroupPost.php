<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;
use App\Models\PostMedia;
use App\Models\GroupMember;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Throwable;


class CreateGroupPost extends Component
{
    use WithFileUploads;

    protected $listeners = ['create-group-post' => '$refresh'];

    public $message;
    public $images;
    public $video;
    public $groupPost;

    public function render()
    {
        $groupMember = GroupMember::where('user_id', auth()->id())
            ->where('group_id', $this->groupPost)
            ->first();

        $author = Group::whereId($this->groupPost)
            ->where('user_id', auth()->id())
            ->first();
        return view('livewire.create-group-post', compact('groupMember', 'author'));
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
                'is_group_post' => 1,
                'group_id' => $this->groupPost,

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

        session()->flash('notify', 'your  post has been published in the group ');
        $this->emit("addNewGroupPost");
        $this->message = '';
    }
}
