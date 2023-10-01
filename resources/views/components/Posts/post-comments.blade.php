<a style="cursor: pointer" data-bs-toggle="dropdown" id="dropdownMenu22" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
    <span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('message-circle'); ?></span>
    <span class="d-none-xss">{{$post->total_Comments }} {{ Str::plural('Comment', $post->total_Comments) }}</span>
</a>
<div style="border-radius:10px;background-color: rgb(199, 230, 253);overflow-y:scroll;max-height:250px;height: fit-content" class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu22">
    @forelse ( $post->comments as $comment )
    {{-- <div style="background-color: rgb(239, 239, 247);border-radius:20px"> --}}
    <span style="color:black;margin-left:1px">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span>
    <span>
        <img style="border-radius: 1000%;height:50px;width:50px" src="{{ asset('storage\\').$comment->user->profile  ?? '../images/profile-2.png'}}" style="border-radius:50%" alt="image" class="shadow-sm rounded-circle w45">
    </span>
    {{-- </div> --}}
    <div style="color:rgb(6, 6, 7);margin-right:60px;margin-top:4px;width:350px;padding-left:20px;background-color:lightsteelblue;border-radius:5px;">
        <span style="width:fit-content;">
            {{ $comment->comment }}
        </span>
    </div>
    <span style="color:blue;margin-left:270px;font-size:10px;margin-top:-50px">
        {{ $comment->created_at->diffForHumans() }}
    </span>
    <hr>
    @empty
    <span style="color:red">There's no comments here</span>
    @endforelse
</div>
