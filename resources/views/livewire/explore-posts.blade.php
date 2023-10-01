<div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">

    <x-Posts.post-header :post="$post" />

    @if($post->postMedia)

    <x-Posts.post-media :post="$post" />
    @endif


    <div class="card-body d-flex p-0 mt-3">

        <x-Posts.post-likes :post="$post" />

        <x-Posts.post-comments :post="$post" />


        {{-- <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false" class="me-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class=" text-grey-900 text-dark btn-round-sm font-lg"><i data-feather="share-2"></i></i><span class="d-none-xs">Share</span></a>
        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu21">
            <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i class=" me-auto font-xssss btn-round-xs bg-greylight text-grey-900 ms-2"><i data-feather="x"></i></i>
            </h4>
            <div class="card-body p-0 d-flex">
                <ul class="d-flex align-items-center justify-content-between mt-2">
                    <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i class="font-xs text-white"><i data-feather="facebook"></i></i></a></li>
                    <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i class="font-xs text-white"><i data-feather="twitter"></i></i></a></li>
                    <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"><i class="font-xs text-white"><i data-feather="linkedin"></i></i></a></li>
                    <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i class="font-xs text-white"><i data-feather="instagram"></i></i></a></li>
                </ul>
            </div>
            <div class="card-body p-0 d-flex">
                <ul class="d-flex align-items-center justify-content-between mt-2">
                    <li><a href="#" class="btn-round-lg bg-whatsup"><i class="font-xs text-white"><i data-feather="phone"></i></i></a></li>
                    <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i class="font-xs text-white"><i data-feather="youtube"></i></i></a></li>
                </ul>
            </div>
            <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">
                Copy Link
                <i class="position-absolute left-15 ms-8 mt--3 font-xs text-grey-500">
                    <i data-feather="copy"></i>
                </i>
            </h4>
            <input  type="text" value="#" class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg">
        </div> --}}

    </div>
    <form wire:submit.prevent='addComment({{ $post->id }})' method="post">
        <input class="form-control" required type="text" wire:model=comment placeholder="...Write your thoughts">
    </form>
</div>
