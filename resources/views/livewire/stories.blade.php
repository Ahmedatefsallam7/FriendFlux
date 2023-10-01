<div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">
    <div class="owl-carousel category-card owl-theme overflow-hidden nav-none">
        <div class="item">
            <div class="card w125 h200 d-block border-0 shadow-none rounded-xxxl bg-dark overflow-hidden mb-3 mt-3">
                <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                    <style>
                        .stories {
                            position: relative;
                            overflow: hidden;
                            display: inline-block;

                        }

                        .stories input[type=file] {
                            font-size: 100px;
                            position: absolute;
                            left: 0;
                            top: 0;
                            opacity: 0;
                            cursor: inherit;
                        }

                    </style>
                    <a class="stories">
                        <div wire:loading wire:target='stories'>
                            <div class="preloader"></div>
                        </div>
                        <span class="btn-round-lg bg-white"><i class="font-lg"><span style="color:rgb(11, 11, 238);margin-top:100px;"><?php echo $icons->getIcon('plus'); ?></i></span>
                        <div class="clearfix"></div>
                        <h4 class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">
                            Add Story </h4>
                        <input type="file" name="images" id="story" wire:model="images" multiple accept="png, jpg, jpeg">

                    </a>
                </div>
            </div>
        </div>
        @forelse ($stories as $story )
        {{-- {{ dd($story->created_at) }} --}}

        <div class="item">
            <div data-bs-toggle="modal" data-bs-target="#modelStory" class="card w125 h200 d-block border-0 shadow-xxxxs rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3" style="background-image: url({{asset('storage').'/'. json_decode($story->story)[0] }});">
                <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                    <a href="#">
                        <figure class="avatar me-auto ms-auto mb-0 position-relative w50 z-index-1">
                            <img style="border-radius: 100%;width:50px;height:50px" src="{{ asset('storage\\').$story->user->profile ??'../images/user-2.png' }}" alt="image" class="float-right p-0 bg-white shadow-xss">
                        </figure>
                        <div class="clearfix"></div>
                        <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">
                            {{ $story->user->first_name." ".$story->user->last_name }} </h4>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div></div>
        @endforelse
    </div>
</div>
