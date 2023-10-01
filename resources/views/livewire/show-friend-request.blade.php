<div wire:poll>
    @if (session()->has('accept'))
    <div class='alert alert-success'>
        {{ session()->get('accept') }}
    </div>
    @endif
    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
        <div class="card-body d-flex align-items-center p-4">
            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friend Request</h4>
            <a href="{{ route('people') }}" class="fw-600 me-auto font-xssss text-primary">See
                all</a>
        </div>
        @forelse ($friendRequests as $request)
        <div class="card-body d-flex pt-4 pe-4 ps-4 pb-0 border-top-xs bor-0">
            <a href="{{ route('user-profile', $request->user->uuid) }}">

                <figure class="avatar ms-3"><img style="border-radius: 50%;width:50px;height:50px" src="{{ asset('storage\\') . $request->user->profile ?? '../images/profile-2.png' }}" alt="image" class="shadow-sm"></figure>
            </a>
            <h4 class="fw-700 text-grey-900 font-xssss mt-1">
                {{ $request->user->first_name . ' ' . $request->user->last_name }}
                <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">
                    {{ 'mutual ' .Str::plural('friend',$request->user()->where('id', '<>', auth()->id())->count()) .' ' .$request->user()->where('id', '<>', auth()->id())->count() }}</span>
            </h4>
        </div>
        <div class="card-body d-flex align-items-center pt-0 pe-4 ps-4 pb-4">
            <button wire:click="acceptFriend({{ $request->user_id }})" class="p-2 lh-20 w100 bg-primary-gradiant ms-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">
                Confirm
            </button>
            <button wire:click="rejectFriend({{ $request->user_id }})" class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">
                Delete
            </button>
        </div>

        @empty
        <div style="text-align:center;color: red;margin-bottom:17px">...No friend requests</div>
        @endforelse

    </div>
</div>
