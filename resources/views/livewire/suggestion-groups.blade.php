<div class="card shadow-xss rounded-xxl border-0 mb-3">
    <div class="card-body d-flex align-items-center p-4">
        <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggestion
            <span>{{Str::plural('Group',$groups->count())}}</span>
        </h4>
        @if($groups)
            <a href="{{route('groups')}}" class="fw-600 me-auto font-xssss text-primary">See
                all</a>
        @endif
    </div>

    @if($groups->count())
        <div style="max-height: 300px;overflow-y:scroll " class="card-body">
            @foreach($groups as $group)
                @if(!$group->is_joiner())
                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                        <a href="{{route('single-group',$group->uuid)}}">
                            <div class="card-body position-relative h150 bg-image-cover bg-image-center"
                                 style="background-image: url({{ asset('storage').'/'.$group->thumbnail ??'../images/bb-9.jpg' }});"></div>
                        </a>
                        <div style="margin-bottom: -20px" class="card-body d-block pt-4 text-center">
                            <a href="{{route('single-group',$group->uuid)}}">
                                <figure
                                    class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 me-auto ms-auto">
                                    <img
                                        src="{{ asset('storage').'/'.$group->icon ?? '../images/profile-2.png' }}"
                                        alt="image" style="height: 75px" class="p-1 bg-white rounded-xl w-100"></figure>
                                <h4 style="text-decoration-line:underline"
                                    class="font-xs ls-1 fw-700 text-grey-900">{{ $group->name }}</h4>
                            </a>
                            <p style="margin-bottom: -10px;margin-top: -5px"
                               class="fw-500 font-xssss text-grey-500">{{ $group->description }}</p>

                            <ul style="margin-bottom: -7px"
                                class="d-flex align-items-center justify-content-center mt-1">
                                <li class="m-2">
                                    <h4 class="fw-700 font-sm">{{ $group->posts->count() }}<span
                                            class="font-xsssss fw-500 mt-1 text-grey-500 d-block">{{ Str::plural('Post',$group->posts->count()) }}</span>
                                    </h4>
                                </li>
                                <li class="m-2">
                                    <h4 class="fw-700 font-sm">{{ $group->members }} <span
                                            class="font-xsssss fw-500 mt-1 text-grey-500 d-block">{{ Str::plural('Follower',$group->members) }}</span>
                                    </h4>
                                </li>

                            </ul>
                        </div>

                        <div style="justify-content: center"
                             class="card-body d-flex pt-0 pe-4 ps-4 pb-4">
                            <a style="cursor: pointer" wire:click.prevent="joinGroup({{$group->id}})"
                               class="p-2 lh-28 w-50 bg-primary-gradiant text-white text-center font-xssss fw-700 rounded-xl"><i
                                    class="font-xss ms-2"></i>join
                            </a>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>

    @else
        <div style="color: red;text-align: center;margin-bottom: 15px"> No suggestion pages
        </div>
    @endif

</div>
