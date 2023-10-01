@section('title','Account Information')
<div class="main-content bg-lightblue theme-dark-bg right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">

            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a title="back" href="{{route('settings')}}" class="mt-2">
                            <i class="font-sm text-white">
                                <span> {!! $icons->getIcon('arrow-left') !!}</span>
                            </i>
                            <span style="color: white;margin-right: 590px;font-size: 20px;font-weight: 700">User Info</span>
                        </a>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 text-center">

                                <figure class="avatar me-auto ms-auto mb-0 mt-2 w100">
                                    <img src="{{asset('storage/'.auth()->user()->profile)}}" alt="image" class="shadow-sm rounded-3 w-100">
                                </figure>
                                <h2 class="fw-700 font-sm text-grey-900 mt-3">{{auth()->user()->first_name." ".auth()->user()->last_name}}</h2>
                                <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4">{{auth()->user()->user_name."@"}}</h4>
                                {{-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a>--}}
                            </div>
                        </div>

                        <form wire:submit.prevent="updateProfile" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">First Name</label>
                                        <input type="text" wire:model.lazy="first_name" class="form-control">
                                    </div>
                                    @error('first_name') <span class="text-red">{{$message}}</span>@enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Last Name</label>
                                        <input type="text" wire:model.lazy="last_name" class="form-control">
                                    </div>
                                    @error('last_name') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                @if(isset(auth()->user()->email))
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Email</label>
                                        <input disabled type="email" wire:model.lazy="email" class="form-control">
                                    </div>
                                    @error('email') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                                @else
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Phone</label>
                                        <input disabled type="tel" wire:model.lazy="mobile" class="form-control">
                                    </div>
                                    @error('mobile') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                                @endif

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">User name</label>
                                        <input type="text" wire:model.lazy="user_name" class="form-control">
                                    </div>
                                    @error('user_name') <span class="text-red">{{$message}}</span>@enderror
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Icon</label>
                                        <input type="file" wire:model.lazy="profile" class="form-control">
                                    </div>
                                    @error('profile') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Thumbnail</label>
                                        <input type="file" wire:model.lazy="thumbnail" class="form-control">
                                    </div>
                                    @error('thumbnail') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Location</label>
                                        <input type="text" wire:model.lazy="location" class="form-control">
                                    </div>
                                    @error('location') <span class="text-red">{{$message}}</span>@enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Relationship</label>

                                        <select class="form-control" wire:model.lazy="relationship">
                                            <option selected>{{auth()->user()->relationship}}</option>
                                            <option value="married">married</option>
                                            <option value="engage">engage</option>
                                        </select>

                                    </div>
                                    @error('relationship') <span class="text-red">{{$message}}</span>@enderror
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="mont-font fw-600 font-xsss">Description</label>
                                    <textarea wire:model.lazy="description" class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5" spellcheck="false"></textarea>
                                    @error('description') <span class="text-red">{{$message}}</span>@enderror
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">
                                        Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
