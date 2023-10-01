<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\PageLike;
use Livewire\Component;

class SuggestionPages extends Component
{
    protected $listeners = [
        'newPage' => '$refresh'
    ];

    public $pages;

    function follow($id)
    {
        $page = Page::whereId($id)->first();

        PageLike::create([
            'user_id' => auth()->id(),
            'page_id' => $id,
        ]);

        $page->update([
            'members' => $page->members + 1,
        ]);

        return to_route('single-page', $page->uuid);

    }

    function unfollow($id)
    {
        $page = Page::whereId($id)->first();

        $page->pageLikes()
            ->where(['user_id' => auth()->id(), 'page_id' => $id])
            ->delete();

        $page->update([
            'members' => $page->members - 1,
        ]);
    }

    public function render()
    {
        return view('livewire.suggestion-pages');
    }
}
