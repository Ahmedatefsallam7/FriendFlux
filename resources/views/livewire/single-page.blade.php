@section('title','Page')
<div class="main-content right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-0">
                    <div class="card w-100 shadow-xss rounded-xxl overflow-hidden border-0 mb-3 mt-3 pb-3">
                        <div class="ca rd-body position-relative h150 bg-image-cover bg-image-center" style="background-image: url({{ asset('storage').'/'.$page->thumbnail ??'../images/bb-9.jpg' }});"></div>
                        <div class="card-body d-block pt-4 text-center">
                            <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                                <img src="{{ asset('storage').'/'.$page->icon ?? '../images/profile-2.png' }}" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>
                            <a href="">
                                <h4 style="text-decoration-line:underline" class="font-xs ls-1 fw-700 text-grey-900">{{ $page->name }}</h4>
                            </a>
                            <span style="text-align: center;font-size: xx-small"> Created By {{$page->user->first_name." ".$page->user->last_name}}</span>

                        </div>
                        <div class="card-body text-center">
                            <h4 style="margin-left:100px" class="font-xsssss text-grey-500 fw-600"><b class="text-grey-900 mb-1 font-xss fw-700 d-inline-block text-dark">{{ $page->posts->count() }} </b>
                                :{{ Str::plural('post', $page->posts->count()) }}</h4>
                            <h4 style="margin-left:-100px;margin-top:-33px" class="font-xsssss text-grey-500 fw-600"><b class="text-grey-900 mb-1  font-xss fw-700 d-inline-block text-dark">{{ $page->members }} </b>
                                :{{ Str::plural('follower', $page->members) }}</h4>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center pe-4 ps-4 pt-0">
                            @if(auth()->id() !== $page->user_id )
                            @if($isFollower)
                            <a title="unfollow this page" wire:click="unfollowPage({{ $page->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-danger font-xsssss fw-700 ls-lg text-white">unfollow</a>
                            @else
                            <a title="follow this page" wire:click="followPage({{ $page->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white">follow</a>
                            @endif

                            @endif

                        </div>

                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-block p-4">
                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                            <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">{{ $page->description }}</p>
                            <hr>
                        </div>

                        <div class="card-body d-flex pt-0">
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="map-pin"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $page->location }}</h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            @if($page->type==='public')
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="unlock"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $page->type }}</h4>
                            @else
                            <i class="text-grey-500 ms-3 font-lg"><i data-feather="lock"></i></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-3">{{ $page->type }}</h4>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    @livewire('create-page-post',['pagePost'=>$page->id])
                    @forelse ($pagePosts as $post )
                    @livewire('explore-group-posts',['post' => $post])
                    @empty
                    <div style="color: rgb(247, 45, 45);border:none;border-radius:10px;font-size: 100%" class="text-center">No posts for the page
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
