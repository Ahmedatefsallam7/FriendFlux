<div class="card-body p-0 d-flex">
    <a href="{{ route('user-profile', $post->user->uuid) }}">
        <figure class="avatar ms-3"><img style="border-radius: 100%;width:50px;height:50px" src="{{ asset('storage\\') . $post->user->profile ?? '../images/profile-2.png' }}" alt="image" class="shadow-sm"></figure>
    </a>
    <h4 style="margin-left:12px" class="fw-700 text-grey-900 font-xssss mt-1">
        {{ $post->user->first_name . ' ' . $post->user->last_name }} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
    </h4>
    @if ($post->group)
    <span style="margin-top:-5px;margin-right: -8px">posted in</span>
    <a style="{{-- text-decoration-line: underline; --}}margin-top:-5px;margin-right: 5px" href="{{ route('single-group', $post->group->uuid) }}"> {{ $post->group->name }}</a>
    @endif
    @if ($post->page)
    <span style="margin-top:-5px;margin-right: -8px">posted in</span>
    <a style="{{-- text-decoration-line: underline; --}}margin-top:-5px;margin-right: 5px" href="{{ route('single-page', $post->page->uuid) }}"> {{ $post->page->name }}</a>
    @endif

    <a href="#" class="me-auto" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="text-grey-900 btn-round-md bg-greylight font-xss"><?php echo $icons->getIcon('more-vertical'); ?></i></a>
    <div style="height: fit-content;max-height: 200px;overflow-y: scroll;" class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
        <div style="margin-bottom: -5px" class="card-body p-0 d-flex">
            <i style="margin-top:-15px" class="text-grey-500 ms-3 font-lg"><?php echo $icons->getIcon('bookmark'); ?></i>
            <a href="{{ route('save-post', $post->uuid) }}">
                <h4 class="fw-600 text-grey-900 font-xssss mt-0 ms-4">Save Post <span class="d-block font-xsssss fw-500 mt-3 lh-3 text-grey-500">Add this
                        post to your saved items</span>
                </h4>
            </a>
        </div>
    </div>
</div>
<div class="card-body p-0 ms-lg-5">
    <p class="fw-500 text-grey-800 lh-26 font-xssss w-100">{{ $post->content }}
    </p>
</div>
