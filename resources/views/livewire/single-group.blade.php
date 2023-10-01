@section('title','Group')
<div class="main-content right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-0">
                    <div class="card w-100 shadow-xss rounded-xxl overflow-hidden border-0 mb-3 mt-3 pb-3">
                        <div class="card-body position-relative h150 bg-image-cover bg-image-center" style="background-image: url({{ asset('storage').'/'.$group->thumbnail ??'../images/bb-9.jpg' }});"></div>
                        <div class="card-body d-block pt-4 text-center">
                            <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                                <img src="{{ asset('storage').'/'.$group->icon ?? '../images/profile-2.png' }}" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>
                            <a href="">
                                <h4 style="text-decoration-line:underline" class="font-xs ls-1 fw-700 text-grey-900">{{ $group->name }}</h4>
                            </a>
                            @if(auth()->id() == $group->user_id)
                            <p style="margin-top:-5px;color: #3db4ec;text-align:match-parent;font-size: xx-small"> you are created this group</p>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h4 style="margin-left:100px" class="font-xsssss text-grey-500 fw-600"><b class="text-grey-900 mb-1 font-xss fw-700 d-inline-block text-dark">{{ $group->posts->count() }} </b>
                                :{{ Str::plural('post', $group->posts->count()) }}</h4>
                            <h4 style="margin-left:-100px;margin-top:-33px" class="font-xsssss text-grey-500 fw-600"><b class="text-grey-900 mb-1  font-xss fw-700 d-inline-block text-dark">{{ $group->members }} </b>
                                :{{ Str::plural('follower', $group->members) }}</h4>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center pe-4 ps-4 pt-0">
                            @if(auth()->id() !== $group->user_id)
                            @if($group->is_joiner())
                            <a title="unfollow this group" wire:click="leaveGroup({{ $group->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-danger font-xsssss fw-700 ls-lg text-white">Leave
                                group</a>
                            @else
                            <a title="follow this group" wire:click="joinGroup({{ $group->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white">Join
                                group</a>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-block p-4">
                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                            <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">{{ $group->description }}</p>
                            <hr>
                        </div>

                        <div class="card-body d-flex pt-0">
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="map-pin"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $group->location }}</h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            @if($group->type==='public')
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="unlock"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $group->type }}</h4>
                            @else
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="lock"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $group->type }}</h4>
                            @endif

                        </div>
                    </div>

                </div>
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    @livewire('create-group-post',['groupPost'=>$group->id])
                    @forelse ($groupPosts as $post )
                    @livewire('explore-group-posts',['post' => $post])
                    @empty
                    <div style="background-color: rgb(247, 45, 45);border:none;border-radius:10px;font-size: 100%" class="text-center text-white">No posts for the group
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
