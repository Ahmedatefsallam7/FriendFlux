<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;
use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Throwable;

class Groups extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $groupName;

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

    public function settings($id)
    {
        dd($id);
    }


    public function render()
    {
        $groups = Group::where('name','like','%'.$this->groupName.'%')
        ->orWhere('description','like','%'.$this->groupName.'%')
        ->latest('members')
        ->paginate(10);
        return view('livewire.groups', compact('groups'));
    }
}
