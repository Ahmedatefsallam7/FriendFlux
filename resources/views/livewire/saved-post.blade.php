@section('title', 'Saved Posts')
<div>
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row justify-content-center">

                    <div class="col-xl-10">
                        <div class="card w-100 border-0 shadow-none bg-transparent mt-5">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a title="back" href="{{ route('settings') }}" class="mt-2">
                                    <i class="font-sm text-white">
                                        <span> {!! $icons->getIcon('arrow-left') !!}</span>
                                    </i>
                                    <span style="color: white;margin-right: 590px;font-size: 15px;font-weight: 700">Saved
                                        Posts</span>
                                </a>
                            </div>
                            <div id="accordion" class="accordion mb-0">
                                @forelse ($posts as $post)
                                {{-- <a href="{{ route('save-post',$post->post->uuid) }}"> --}}
                                <div class="card shadow-xss">
                                    <div class="card-header text-right" id="headingOne">
                                        <div class="card-body p-0">
                                            <h4 style="display: inline-block;margin-left:12px" class="fw-700 text-grey-900 font-xssss mt-1">
                                                {{ $post->user->first_name . ' ' . $post->user->last_name }} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
                                            </h4>
                                            @if ($post->group)
                                            <span style="display: inline-block;margin-top:-5px;margin-right: -8px">posted in</span>
                                            <a style="{{-- text-decoration-line: underline; --}}margin-top:-5px;margin-right: 5px" href="{{ route('single-group', $post->group->uuid) }}">
                                                {{ $post->group->name }}</a>
                                            @endif
                                            @if ($post->page)
                                            <span style="display: inline-block;margin-top:-5px;margin-right: -8px">posted in</span>
                                            <a style="{{-- text-decoration-line: underline; --}}margin-top:-5px;margin-right: 5px" href="{{ route('single-page', $post->page->uuid) }}">
                                                {{ $post->page->name }}</a>
                                            @endif
                                            <a href="{{ route('user-profile', $post->user->uuid) }}" class="d-inline-block">
                                                <figure class="avatar ms-3 d-inline-block"><img style="display: inline-block;border-radius: 100%;width:50px;height:50px" src="{{ asset('storage\\') . $post->user->profile ?? '../images/profile-2.png' }}" alt="image" class="shadow-sm"></figure>
                                            </a>

                                        </div>
                                        <div class="card-body p-0 ms-lg-5">
                                            <p class="fw-500 text-grey-800 lh-26 font-xssss w-100">
                                                {{ $post->post->content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- </a> --}}
                                @empty
                                <div class="text-center text-red">... You don't saved any posts</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
