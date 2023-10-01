<div wire:poll class="card shadow-xss rounded-xxl border-0 mb-3">
    <div class="card-body d-flex align-items-center p-4">
        <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggestion People
        </h4>
        @if ($users)
        <a href="{{ route('people') }}" class="fw-600 me-auto font-xssss text-primary">See
            all</a>
        @endif
    </div>

    @if ($users->count())
    <div style="max-height: 300px;overflow-y:scroll " class="card-body">
        @foreach ($users as $user)
        @if (!$user->is_friend())
        <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
            <a href="{{ route('user-profile', $user->uuid) }}">
                <div class="card-body position-relative h150 bg-image-cover bg-image-center" style="background-image: url({{ asset('storage') . '/' . $user->thumbnail ?? '../images/bb-9.jpg' }});">
                </div>
            </a>
            <div style="margin-bottom: -20px" class="card-body d-block pt-4 text-center">
                <a href="{{ route('user-profile', $user->uuid) }}">
                    <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                        <img src="{{ asset('storage') . '/' . $user->profile ?? '../images/profile-2.png' }}" alt="image" style="height: 75px" class="p-1 bg-white rounded-xl w-100">
                    </figure>
                    <h4 style="text-decoration-line:underline" class="font-xs ls-1 fw-700 text-grey-900">
                        {{ $user->first_name . ' ' . $user->last_name }}</h4>
                </a>
                <p style="margin-bottom: -10px;margin-top: -5px" class="fw-500 font-xssss text-grey-500">
                    {{ $user->description }}</p>

            </div>

            <div style="margin-top: 17px;justify-content: center" class="card-body d-flex pt-0 pe-4 ps-4 pb-4">
                <a style="cursor: pointer" wire:click.prevent="addFriend({{ $user->id }})" class="p-2 lh-28 w-50 bg-primary-gradiant text-white text-center font-xssss fw-700 rounded-xl"><i class="font-xss ms-2"></i>Add Friend
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @else
    <div style="color: red;text-align: center;margin-bottom: 15px"> No suggestion people
    </div>
    @endif

</div>
