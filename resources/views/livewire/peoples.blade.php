<!-- main content -->
<div class="main-content">
    @section('title', 'Explore people')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left ps-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <div class="card-body d-flex align-items-center p-0">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Friends</h2>
                            <div class="search-form-2 me-auto">
                                <i style="margin-top:-7px" class="font-xss left-15 right-auto"><i
                                        data-feather="search"></i></i>
                                <input wire:model="search" type="text"
                                       class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                       placeholder="...Search here">
                            </div>
                        </div>
                    </div>


                    <div class="row pe-2 ps-2">
                        @forelse ($users as $user )
                            <div class="col-md-3 col-sm-4 ps-2 pe-2">
                                <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                    <div class="card-body d-block w-100 pe-3 ps-3 pb-4 text-center">
                                        <a href="{{route('user-profile',$user->uuid )}}">

                                            <figure class="avatar me-auto ms-auto mb-0 position-relative w65 z-index-1">
                                                <img style="border-radius:50%;width:80px;height:80px"
                                                     src="{{asset('storage\\').$user->profile  ?? '../images/profile-2.png' }}" alt="image"
                                                     class="float-right p-0 bg-white shadow-xss"></figure>
                                        </a>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 font-xsss mt-3 mb-1">{{ $user->first_name ." ". $user->last_name }} </h4>
                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">{{ $user->user_name.'@' }}</p>

                                        @livewire('refresh-people',['user'=>$user])

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-red font-md">...No friends here</div>
                        @endforelse
                    </div>

                </div>
{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>
</div>
