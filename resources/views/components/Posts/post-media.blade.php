<div class="card-body d-block p-0">
    <div class="row pe-2 ps-2">
        @if($post->postMedia->file_type=='image')
        <div class="p-1" style="width:100%;height:700px;">
            <a href="{{ asset('storage/'.$post->postMedia->file) }}" data-lightbox="roadtrip">
                <img width="100%" height="100%" src="{{ asset('storage/'.$post->postMedia->file) }}" class="rounded-3">
            </a>
        </div>
        @endif


        @if($post->postMedia->file_type=='video')
        <div class="pe-2" style="width:100%;height:300px;">
            <a href="{{ asset('storage/'.$post->postMedia->file) }}" data-lightbox="roadtrip">
                <video controls preload="auto" width="100%" height="100%" src="{{ asset('storage/'.$post->postMedia->file) }}" type='video/mp4' class="rounded-3 w-100">
                </video>
            </a>
        </div>
        @endif
    </div>
</div>
