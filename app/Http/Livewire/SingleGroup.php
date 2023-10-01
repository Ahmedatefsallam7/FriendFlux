<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Group;
use Livewire\Component;
use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;
use Throwable;

class SingleGroup extends Component
{
    public $uuid;

    function mount($uuid)
    {
        $this->uuid = $uuid;
    }

    function joinGroup($id)
    {
        DB::beginTransaction();
        try {

            $groupMember = GroupMember::create([
                'user_id' => auth()->id(),
                'group_id' => $id,
            ]);

            $group = Group::whereId($groupMember->group_id)->first();
            $group->update([
                'members' => $group->members + 1,
            ]);


            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    function leaveGroup($id)
    {
        DB::beginTransaction();
        try {

            GroupMember::where([
                'user_id' => auth()->id(),
                'group_id' => $id
            ])->delete();

            $group = Group::whereId($id)->first();
            $group->update([
                'members' => $group->members - 1,
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    function settings($id)
    {
        dd($id);
    }

    public function render()
    {
        $group = Group::where('uuid', $this->uuid)->firstOrFail();
        $groupPosts = Post::where('group_id', $group->id)
            ->where('is_group_post', 1)
            ->latest()
            ->get();
        return view('livewire.single-group', compact(['group', 'groupPosts']));
    }
}
