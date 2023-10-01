@section('title','Videos')
<div class="main-content">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left ps-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <div class="card-body d-flex align-items-center p-0">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Videos</h2>
                            <div class="search-form-2 me-auto">
                                <i class="font-xss left-15 right-auto"><i style="margin-top:-15px" data-feather="search"></i></i>
                                <input wire:model="search" type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="...Search here">
                            </div>
                        </div>
                    </div>

                    <div class="row pe-2 ps-2">
                        @forelse ($posts as $post )
                        @livewire('explore-posts',['post' => $post])
                        @empty
                        <div style="color: rgb(247, 45, 45);border:none;border-radius:10px;font-size: 100%" class="text-center text-white">...No videos found</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
