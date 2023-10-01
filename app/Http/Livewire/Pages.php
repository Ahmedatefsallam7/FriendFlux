<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use App\Models\PageLike;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;
    protected $listeners = ['newPage' => '$refresh'];


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
        return to_route('single-page',$page->uuid);
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

    function settings($id)
    {
        dd($id);
    }

    public function render()
    {
        $pages = Page::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->latest('members')->paginate(15);

        return view('livewire.pages', compact('pages'));
    }
}
