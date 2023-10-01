<div>
    @section('title', 'Pages ')
    <div class="main-content right-chat-active">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left ps-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Pages</h2>
                                <div class="search-form-2 me-auto">
                                    <i style="margin-top:-7px" class="font-xss left-15 right-auto"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('search'); ?></span></i>
                                    <input wire:model="search" type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="...Search here">
                                </div>
                                <a title="create new page" href="{{ route('create-page') }}" class="cursor-pointer btn-round-md me-2 bg-primary theme-dark-bg rounded-3"><i class="font-xss text-white"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('plus'); ?></span></i></a>
                            </div>
                        </div>

                        <div class="row pe-2 ps-1">
                            @forelse ($pages as $page )
                            <div style="height: fit-content" class="col-md-4 col-sm-6 ps-2 pe-2">

                                <div style="height: fit-content" class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                    <a href="{{route('single-page',$page->uuid)}}">
                                        <div class="card-body position-relative bg-image-cover bg-image-center" style="height:130px; background-image: url({{ asset('storage').'/'.$page->thumbnail ??'../images/bb-9.jpg' }});"></div>
                                    </a>
                                    <div wire:poll class="card-body d-block w-100 p-4 text-center">
                                        <div style="margin-bottom: -20px" class="card-body d-block pt-4 text-center">
                                            <a href="{{route('single-page',$page->uuid)}}">
                                                <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                                                    <img style="height: 80px" src="{{ asset('storage').'/'.$page->icon ?? '../images/profile-2.png' }}" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>
                                                <h4 style="text-decoration-line:underline" class="font-xs ls-1 fw-700 text-grey-900">{{ $page->name }}</h4>
                                            </a>
                                            <p style="margin-bottom: -10px;margin-top: -5px" class="fw-500 font-xssss text-grey-500">{{ $page->description }}</p>
                                            @if(auth()->id() == $page->user_id )
                                            <span style="margin-bottom: -5px;font-size: xx-small;color:#3db4ec">you are created this page
                                            </span>
                                            @endif

                                        </div>
                                        <ul style="margin-bottom: -7px" class="d-flex align-items-center justify-content-center mt-1">
                                            <li class="m-2">
                                                <h4 class="fw-700 font-sm">{{ $page->posts->count() }}<span class="font-xsssss fw-500 mt-1 text-grey-500 d-block">{{ Str::plural('Post',$page->posts->count()) }}</span>
                                                </h4>
                                            </li>
                                            <li class="m-2">
                                                <h4 class="fw-700 font-sm">{{ $page->members }} <span class="font-xsssss fw-500 mt-1 text-grey-500 d-block">{{ Str::plural('Follower',$page->members) }}</span>
                                                </h4>
                                            </li>

                                        </ul>
                                        @if(auth()->id() !== $page->user_id )
                                        @if(App\Models\PageLike::where(['user_id'=>auth()->id(),'page_id'=>$page->id])->exists())

                                        <a style="cursor: pointer;margin-top:10px" wire:click="unfollow({{ $page->id }})" class="p-0 btn p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-danger font-xsssss fw-700 ls-lg text-white" title="unfollow this page">Unfollow</a>
                                        @else
                                        <a style="cursor: pointer;margin-top:10px" wire:click="follow({{ $page->id }})" class=" p-0 btn p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-primary font-xsssss fw-700 ls-lg text-white" title="follow this page">follow</a>
                                        @endif

                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center text-red font-md">...No pages found</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{ $pages->links() }}
            </div>
        </div>
    </div>
