@section('title', 'user-profile ')
<div>
    <!-- main content -->
    <div class="main-content">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                            <div class="card-body position-relative h240 bg-image-cover bg-image-center" style="margin-left:1000px;width:25%;background-image: url({{ asset('storage\\') . $user->thumbnail ?? '../images/profile-2.png' }});">
                            </div>

                            <div class="card-body d-block pt-4 text-center position-relative">
                                <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                                    <img src="{{ asset('storage\\') . $user->profile ?? '../images/profile-2.png' }}" alt="image" style="border-radius:50%;width:100px;height:100px" class="p-1 bg-white">
                                </figure>

                                <h4 class="font-xs ls-1 fw-700 text-grey-900">
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                    <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $user->user_name . '@' }}</span>
                                </h4>
                                <div class="d-flex align-items-center pt-0 position-absolute left-15 top-10 mt-4 me-2">
                                    <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 me-2 ms-2">
                                        <b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">{{ $user->posts->count() }}
                                        </b>
                                        Posts
                                    </h4>

                                    <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 me-2 ms-2">
                                        <b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">{{ App\Models\Friend::where(['user_id' => $user->id, 'status' => 'accepted'])->orWhere(['friend_id' => $user->id, 'status' => 'accepted'])->count() }}
                                        </b>
                                        Friends
                                    </h4>
                                    {{-- <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 me-2 ms-2"><b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">32k </b> Follow</h4> --}}
                                </div>
                                <div style="display: inline-block;margin-right: 60px;margin-top: 30px" class="position-absolute right-15 top-10 ms-2">
                                    @if ($user->id === auth()->id())
                                    <a href="{{ route('settings.account_information') }}" title="edit your profile" style="border:none;background-color: blue" class="mt-0 btn pt-2 pb-2  lh-24  rounded-xl font-xsssss fw-700 ls-lg text-white">
                                        Edit profile
                                    </a>
                                    @else
                                    <div style="display: inline-block" wire:poll>
                                        {{-- {{dd($user)}} --}}
                                        @if ($user->is_friend() === 'pending')
                                        @if ($user->is_sender())
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
                                        @elseif ($user->is_friend() === 'accepted')
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

                                    @endif
                                </div>
                            </div>
                            @if ($user->id != auth()->id())
                            <span style="margin-right: 430px;">
                                <a title="Start chat with {{ $user->first_name }}" href="{{ route('chatUser', $user) }}" style="border-radius: 10px;padding: 5px ;border: none;color:white;background-color:blue;">
                                    Start chat
                                </a>
                            </span>
                            @endif

                            <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                                <ul class="nav nav-tabs h55 d-flex product-info-tab border-bottom-0 pe-4" id="pills-tab" role="tablist">
                                    <li class="active list-inline-item ms-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active" href="#navtabs1" data-toggle="tab">About</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-3 col-lg-4 ps-0">
                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                            <div class="card-body d-block p-4">
                                <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                                <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">
                                    {{ $user->description ?? 'no description here' }}</p>
                            </div>

                            <div class="card-body d-flex pt-0">
                                <i class="text-grey-500 ms-3 font-lg"><i data-feather="map-pin"></i></i>
                                <p style="display: inline-block" class="fw-500 text-grey-500 mb-0 font-xssss">
                                    {{ $user->location ?? 'Egypt' }}</p>
                            </div>

                        </div>
                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                            <div class="card-body d-flex align-items-center  p-4">
                                <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                                <a href="#" class="fw-600 me-auto font-xssss text-primary">See all</a>
                            </div>
                            @if (isset($images))
                            <div class="card-body d-block pt-0 pb-2">
                                <div class="row">
                                    @forelse ($images as $img)
                                    <div class="col-6 mb-2 ps-1"><a href="{{ asset('storage/' . $img->file) }}" data-lightbox="roadtrip"><img src="{{ asset('storage/' . $img->file) }}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                    @empty
                                    <div class="text-center text-red">...No images found</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-body d-block w-100 pt-0">
                                <a href="#" class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i class="font-xss ms-2"><i data-feather="external-link"></i></i> More</a>
                            </div>
                            @else
                            <div class="text-center">...No images found</div>
                            @endif

                        </div>


                    </div>
                    <div class="col-xl-8 col-xxl-9 col-lg-8">

                        {{-- @livewire('create-post') --}}

                        @forelse ($posts as $post)
                        @livewire('explore-posts', ['post' => $post])
                        @empty
                        <div style="color: rgb(247, 45, 45);border:none;border-radius:10px;font-size: 100%" class="text-center">...No posts found
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
</div>
