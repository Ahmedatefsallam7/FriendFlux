<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\PageLike;
use App\Models\Post;
use Livewire\Component;

class SinglePage extends Component
{
    public $uuid;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
    }

    public function followPage($id)
    {
        $page = Page::whereId($id)->first();

        PageLike::create([
            'user_id' => auth()->id(),
            'page_id' => $id,
        ]);

        $page->update([
            'members' => $page->members + 1,
        ]);

    }

    function unfollowPage($id)
    {
        $page = Page::whereId($id)->first();

        $page->pageLikes()
            ->where(['user_id' => auth()->id(), 'page_id' => $id])
            ->delete();

        $page->update([
            'members' => $page->members - 1,
        ]);
    }

    function settings($id){
        dd($id);
    }


    public function render()
    {
        $page = Page::where('uuid', $this->uuid)->firstOrFail();
        $isFollower = PageLike::where(['user_id' => auth()->id(), 'page_id' => $page->id])->first();
        $pagePosts = Post::where(['page_id' => $page->id, 'is_page_post' => 1])->latest()->get();
        return view('livewire.single-page', compact('pagePosts', 'page', 'isFollower'));
    }
}
