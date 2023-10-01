<div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">

    <x-Posts.post-header :post="$post" />

    @if($post->postMedia)

    <x-Posts.post-media :post="$post" />
    @endif


    <div class="card-body d-flex p-0 mt-3">

        <x-Posts.post-likes :post="$post" />

        <x-Posts.post-comments  :post="$post"  />


    </div>
    <form wire:submit.prevent='addComment({{ $post->id }})' method="post">
        <input class="form-control" required type="text" wire:model=comment placeholder="...Write your thoughts">
    </form>
</div>

