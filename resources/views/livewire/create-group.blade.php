@section('title','create group')
<div>
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="middle-wrap">

                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a title="back" href="{{ route('groups') }}" class="d-inline-block mt-2"><i class="font-sm text-white"><i style="margin-top: -15px" data-feather="skip-back"></i></i></a>
                        <h4 style="margin-right:550px" class="font-xs text-white fw-600  mb-0 mt-2">Create Your Group</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 text-center">
                                <figure class="avatar me-auto ms-auto mb-0 mt-2"><img src="{{ asset('storage\\').auth()->user()->profile ?? '../images/pt-1.jpg' }}" alt="image" style="border-radius: 50%;width:80px;height:80px" class="shadow-sm"></figure>
                                <h2 class="fw-700 font-sm text-grey-900 mt-3">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</h2>
                                <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4">{{ auth()->user()->user_name."@" }}</h4>
                            </div>
                        </div>

                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Group Name</label>
                                        <input type="text" wire:model="name" class="form-control" required>
                                    </div>
                                    @error("name") <p class="text-red">*{{ $message }}</p> @enderror
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Group Icon</label>
                                        <input type="file" wire:model="icon" class="form-control" required>
                                    </div>
                                    @error("icon") <p class="text-red">*{{ $message }}</p> @enderror
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Group thumbnail</label>
                                        <input type="file" wire:model="thumbnail" class="form-control">
                                    </div>
                                    @error("thumbnail") <p class="text-red">*{{ $message }}</p> @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Group Location</label>
                                        <input type="text" wire:model="location" class="form-control">
                                    </div>
                                    @error("location") <p class="text-red">*{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Group Type</label>
                                        <select class="form-control" wire:model="type">
                                            {{-- <option value="{{ ' ' }}" disabled selected>...</option> --}}
                                            <option value="{{ 'public' }}">Public</option>
                                            <option value="{{ 'private' }}">Private</option>
                                        </select>
                                    </div>
                                    @error("type") <p class="text-red">*{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-12 mb-3">
                                    <label class="mont-font fw-600 font-xsss">Group Description</label>
                                    <textarea wire:model='description' class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5" placeholder="...Write description for group" spellcheck="true"></textarea>
                                </div>
                                @error("description") <p class="text-red">*{{ $message }}</p> @enderror

                                <div class="col-lg-12 text-center">
                                    <button type="submit" onclick="window.scrollTo(0,0)" class="bg-primary btn text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
