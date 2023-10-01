@php
$liked=App\Models\Like::where(['post_id'=>$post->id,'user_id'=>auth()->id()])->first();
@endphp

@if($liked)
<a style="cursor:pointer;color:blue" wire:click.prevent='disLike({{ $post->id }})' class="emoji-bttn d-flex align-items-center fw-600 lh-26 font-xssss ms-2"><span style="margin-top:-7px ;margin-left:4px"><?php echo $icons->getIcon('thumbs-up'); ?></span>
    {{$post->total_Likes }} {{ Str::plural('Like', $post->total_Likes) }}
</a>
@else
<a id="eee" style="cursor:pointer;color:black" wire:click.prevent='addLike({{ $post->id }})' class="emoji-bttn d-flex align-items-center fw-600  lh-26 font-xssss ms-2"><span style="margin-top:-7px ;margin-left:4px"><?php echo $icons->getIcon('thumbs-up'); ?></span>
    {{$post->total_Likes }} {{ Str::plural('like', $post->total_Likes) }}
</a>
@endif
