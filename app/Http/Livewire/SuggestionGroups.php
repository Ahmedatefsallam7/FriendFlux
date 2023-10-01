<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SuggestionGroups extends Component
{
    public $groups;

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

        return to_route('single-group', $group->uuid);
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

    public function render()
    {
        return view('livewire.suggestion-groups');
    }
}
