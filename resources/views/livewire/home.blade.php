<div>
    @section('title', 'Home')
    <!--start main content -->

    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <div class="row feed-body">
                    <div class="col-xl-8 col-xxl-9 col-lg-8">

                        @if (session('save'))
                        <div id="save" class="text-center alert alert-success">
                            {{ session('save') }}
                        </div>
                        @endif
                        <script>
                            let x = document.getElementById('save');
                            setTimeout(() => {
                                x.style.display = "none";
                            }, 3000);

                        </script>

                        @livewire('stories')

                        @livewire('create-post')

                        @forelse ($posts as $post)
                        @livewire('explore-posts', ['post' => $post])
                        @empty
                        <div style="color: rgb(247, 45, 45);border:none;border-radius:10px;font-size: 100%" class="text-center">...No posts found
                        </div>
                        @endforelse

                    </div>

                    <div class="col-xl-4 col-xxl-3 col-lg-4 pe-lg-0">

                        @livewire('show-friend-request')

                        @livewire('suggestion-people')

                        @if ($pages->count())
                        @livewire('suggestion-pages', ['pages' => $pages])
                        @endif

                        @if ($groups->count())
                        @livewire('suggestion-groups', ['groups' => $groups])
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
            <div class="snippet mt-2 me-auto ms-auto" data-title=".dot-typing">
                <div class="stage">
                    <div class="dot-typing"></div>
                </div>
            </div>
        </div>

    </div>

</div>
<!--end main content -->

{{-- model stories  --}}
@php
$stories = $stories = App\Models\Story::where('created_at', '>=', now()->subDay())
->latest()
->get()
->unique('user_id');
@endphp

@foreach ($stories as $story)
<div class="modal bottom side fade" id="modelStory" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 bg-transparent">
            <button type="button" class="close mt-0  top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="text-grey-900 font-xssss"><i data-feather="x-circle"></i></i></button>
            <div class="modal-body p-0">
                <div style="height: 500px" class="card border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                    <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                        @foreach (json_decode($story->story) as $story)
                        <div style="height: fit-content" class="item"><img style="height:500px;width:500px;" src="{{ asset('storage') . '/' . $story }}" alt="image"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                <input type="text" class="w-100 bg-transparent border-light-md p-3 ps-5 font-xssss fw-500" placeholder="Write Comments">
            </div>
        </div>
    </div>
</div>
@endforeach
