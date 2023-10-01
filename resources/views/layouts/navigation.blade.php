<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="{{ url('/') }}">
            <span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">{{ config('app.name') }}
            </span>
        </a>
    </div>

    {{-- @livewire('sea') --}}

    <form action="{{ route('search') }}" method="get">
        <div class="form-group mb-0 icon-input">
            <input type="text" name="query" placeholder="...Start typing to search posts" class="bg-grey border-0 lh-32 pt-2 pb-2 pe-5 ps-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
            <i style="margin-top: -10px"><span>{!! $icons->getIcon('search') !!}</span></i>
        </div>
    </form>


    <a title="home" href="{{ url('/') }}" class="m-2 text-current font-lg btn-round-lg theme-dark-bg">
        <span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('home'); ?></span>
    </a>

    <a style="cursor: pointer;" title="explore people" href="{{ route('people') }}" class="m-2 text-current  font-lg btn-round-lg theme-dark-bg">
        <span style="margin-top:-7px;"><?php echo $icons->getIcon('zap'); ?></span>
    </a>

    <a title="videos" href="{{ route('videos') }}" class="m-2 text-current  font-lg btn-round-lg theme-dark-bg">
        <span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('video'); ?></span>
    </a>
    <a title='profile' href="{{ route('user-profile', auth()->user()->uuid) }}" class="m-2 text-current  font-lg btn-round-lg theme-dark-bg"><span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('user'); ?></span></a>



    <span style="margin-right: 350px">@livewire('notifications')</span>

    <a href="{{ url('chat') }}" class="m-2 text-current  font-lg btn-round-lg theme-dark-bg text-center me-3 menu-icon"><span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('message-circle'); ?></span></a>
    <div class="text-current  font-lg btn-round-lg theme-dark-bg  text-center me-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
        <span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('settings'); ?></span>
        <div class="dropdown-menu-settings switchcolor-wrap">
            <h4 class="fw-700 font-sm mb-4">Settings</h4>
            <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
            <ul>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="red" checked=""><i class=""> </i>
                        <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="green"><i class=""> </i>
                        <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                        <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                        <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                        <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                        <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                        <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                    </label>
                </li>

                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                        <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                        <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                        <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                        <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                    </label>
                </li>
                <li>
                    <label class="item-radio item-content">
                        <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                        <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                    </label>
                </li>
            </ul>

            <div class="card bg-transparent-card border-0 d-block mt-3 text-left">
                <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                </div>
            </div>
            <div class="card bg-transparent-card border-0 d-block mt-3 text-left">
                <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                </div>
            </div>
            <div class="card bg-transparent-card border-0 d-block mt-3 text-left">
                <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                <div class="d-inline float-right mt-1">
                    <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                </div>
            </div>
            <div class="card bg-transparent-card border-0 d-block mt-3 text-left">
                <a href="{{ route('logout') }}">
                    <h4 class="d-inline font-xssss mont-font fw-700">Logout</h4>
                    <div class="d-inline float-right mt-1">
                        <i>
                            <span style="margin-top:-7px;"><?php echo $icons->getIcon('log-out'); ?></span>
                        </i>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <a href="{{ route('user-profile', auth()->user()->uuid) }}">
        <img style="border-radius: 100%;height:50px;width:50px" src="{{ asset('storage\\') . auth()->user()->profile ?? '../images/profile-2.png' }}" alt="user" class="m-2 mt-1">
    </a>

</div>
