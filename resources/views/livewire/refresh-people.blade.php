<div wire:poll>
    {{-- {{dd($user)}}--}}
    @if ($user->is_friend() === 'pending')
    @if($user->is_sender())
    <button title="remove request" wire:click.prevent="cancelRequest({{ $user->id }})" style="display:inline-block;cursor:pointer" type="submit" class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 rounded-xl bg-warning font-xsssss fw-700 ls-lg text-white">
        Cancel request
    </button>
    <span style="display:block;font-size: 15px">...pending</span>
    @else
    <button title="you can accept this request" wire:click.prevent="acceptRequest({{ $user->id }})" style="display:inline-block;cursor:pointer" type="submit" class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 rounded-xl bg-primary font-xsssss fw-700 ls-lg text-white">
        Accept Request
    </button>

    @endif
    @elseif ($user->is_friend() === 'rejected')
    <button title="send friend request" wire:click.prevent="rejectFriend({{ $user->id }})" style="cursor:pointer" type="submit" class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">
        Add Friend
    </button>

    @elseif ($user->is_friend() === 'accepted' )
    <button wire:click="removeFriend({{ $user->id }})" title="you can remove this user from friends" style="border:none;background-color: red" class="mt-0 btn pt-2 pb-2  lh-24  rounded-xl font-xsssss fw-700 ls-lg text-white">
        Remove Friend
    </button>
    <span style="display:block;font-size: 15px">Your Friend</span>
    @else
    <button title="send friend request" wire:click.prevent="addFriend({{ $user->id }})" style="cursor:pointer" class="mt-0 pt-2 btn pb-2 pe-3 ps-3 lh-24 me-1 ls-3 rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">
        Add Friend
    </button>
    @endif
</div>
