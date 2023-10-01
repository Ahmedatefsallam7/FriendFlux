<div wire:poll>
    @if (session()->has('notify'))
    <div style="display:block" id="close_notification" class="alert alert-success">
        {{ session()->get('notify') }}
    </div>
    @endif
    {{-- start create post --}}
    @if($groupMember || $author)
    <div class="card w-100 shadow-xss rounded-xxl border-0 pe-4 pt-4 ps-4 pb-3 mb-3">
        <div class="card-body p-0">
            <p class="font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary ms-2 bg-greylight"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('edit'); ?></span></i>Create
                Post</p>
        </div>
        <div style="margin-left:50px;margin-bottom:10px;" class="card-body p-0 mt-3 position-relative">
            <a href="{{ route('user-profile',auth()->user()->uuid ) }}">

                <figure class="avatar position-absolute me-4 mt-1 top-5"><img style="border-radius: 100%;width:50px;height:50px;" src="{{ asset('storage\\').auth()->user()->profile  ?? '../images/profile-2.png'}}" alt="image" class="shadow-sm">
                </figure>
            </a>
            <textarea wire:model='message' name="message" style="margin-right: 25px" class="h100 bor-0 w-100 rounded-xxl p-2 pe-5 font-xssss text-grey-900 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="?What's on your mind"></textarea>
        </div>
        @error('message')<span style="color: red">{{ $message }}</span> @enderror

        <div wire:loading wire:target='images'>Uploading...</div>
        <div wire:loading wire:target='video'>Uploading...</div>


        @if ($images)
        <img src="{{ $images->temporaryUrl() }}" alt="" width="100%" height="50%">
        @endif

        @if($video)
        <video src="{{ $video->temporaryUrl() }}" alt="" width="100%" height="60%"></video>
        @endif

        <style>
            .uploads {
                position: relative;
                overflow: hidden;
                display: inline-block;

            }

            .uploads input[type=file] {
                font-size: 100px;
                position: absolute;
                left: 0;
                top: 0;
                opacity: 0;
                cursor: inherit;
            }

        </style>

        <div class="card-body d-flex p-0 mt-0">

            {{-- start uploads images --}}
            <a href="#" class="uploads d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark ps-4">
                <i class="font-md text-success  ms-2">
                    <span style="margin-top:-7px;"><?php echo $icons->getIcon('image'); ?></span>
                </i>
                <span class="d-none-xs">Photo
                    <input type="file" wire:model="images">
                </span>
            </a>
            {{-- end uploads images --}}



            {{-- start uploads videos --}}
            <a href="#" class="uploads d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark ps-4">
                <i class="font-md text-success  ms-2">
                    <span style="margin-top:-7px;"><?php echo $icons->getIcon('video'); ?></span>
                </i>
                <span class="d-none-xs">Video
                    <input type="file" wire:model="video">
                </span>
            </a>
            {{-- end uploads videos --}}

            <button wire:click.prevent="storePost" title="add new post" onclick="window.scrollTo(0,0)" style="background-color:rgb(101, 11, 236)" class="me-auto btn text-white rounded-circle"> <span style="margin-top:-7px;"><?php echo $icons->getIcon('send'); ?></span></i></button>

        </div>
    </div>
    @endif

    {{-- end create post --}}
    <script>
        const x = document.querySelector('#close_notification');
        setTimeout(() => {
            x.style.display = 'none';

        }, 3000);

    </script>

</div>
