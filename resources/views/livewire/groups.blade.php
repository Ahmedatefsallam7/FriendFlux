@section('title','Groups')
<div wire:poll class="main-content right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left ps-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <div class="card-body d-flex align-items-center p-0">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Groups</h2>
                            <div class="search-form-2 me-auto">
                                <i style="margin-top:-7px" class="font-xss left-15 right-auto"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('search'); ?></span></i>
                                <input type="text" wire:model="groupName" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="...Search here">
                            </div>
                            {{-- {{ dd($groups) }} --}}
                            <a title="Create your group" href="{{ route('create-group') }}" class="btn-round-md me-2 bg-primary rounded-3"><i class="font-xss text-white"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('plus'); ?></span></i></a>
                        </div>
                    </div>

                    <div class="row pe-2 ps-1">

                        @forelse ($groups as $group)
                        <div class="col-md-6 col-sm-6 ps-2 pe-2">
                            <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                <a href="{{ route('single-group',$group->uuid) }}">
                                    <div class="card-body position-relative h100 bg-image-cover bg-image-center" style="background-image: url({{ asset("storage/".$group->thumbnail) ?? '../images/bb-16.png' }});"></div>
                                </a>
                                <div class="card-body d-block w-100 pr-10 pb-4 pt-0 text-left position-relative">
                                    <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; right: 15px;">
                                        <a href="{{ route('single-group',$group->uuid) }}">
                                            <img src="{{ asset("storage/".$group->icon) ?? '../images/user-12.png' }}" alt="image" class="float-right p-1 bg-white rounded-circle w-100">
                                        </a>
                                    </figure>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('single-group',$group->uuid) }}">
                                        <h4 style="text-decoration-line:underline" class="fw-700 font-xsss mt-3 mb-1">{{ $group->name }}</h4>
                                    </a>

                                    <p class="fw-500 font-xsssss text-grey-500 mt-2">{{ ($group->description) ? "Desc:".$group->description: "" }}</p>
                                    @if(auth()->id() == $group->user_id)
                                    <p style="margin-top:-5px;color: #3db4ec;text-align:match-parent;font-size: xx-small"> you are created this group</p>
                                    @endif
                                    <p class="fw-500 font-xsssss text-grey-500 mt--1 mb-3">{{ Str::plural('follower', $group->members) }}: <span class="text-black">{{ $group->members }}</span> </p>
                                    <p class="fw-500 font-xsssss text-grey-500 mt--1 mb-1">{{ Str::plural('post', $group->posts->count()) }}: <span class="text-black">{{ $group->posts->count() }}</span> </p>
                                    <p class="fw-500 font-xsssss text-grey-500 mb--1 mt-1 mb-3">Owner: {{ $group->user->first_name." ".$group->user->last_name  }}</p>
                                    <span class="position-absolute left-15 right-auto top-0 d-flex align-items-center">

                                        @if(auth()->id() !== $group->user_id)
                                        @if($group->is_joiner())
                                        <a title="unfollow this group" wire:click="leaveGroup({{ $group->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-danger font-xsssss fw-700 ls-lg text-white">Leave group</a>
                                        @else
                                        <a title="follow this group" wire:click="joinGroup({{ $group->id }})" class="cursor-pointer text-center p-2 lh-24 w100 me-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white">Join group</a>
                                        @endif

                                        @endif

                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-red">...No Groups Found</div>
                        @endforelse
                    </div>
                </div>
                {{ $groups->links() }}
            </div>
        </div>
    </div>
</div>
