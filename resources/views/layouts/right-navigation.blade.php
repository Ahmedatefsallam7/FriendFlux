<nav class="navigation scroll-bar">
    <div class="container pe-0 ps-0">
        <div class="nav-content">
            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                <ul class="mb-1 top-content">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li><a href="{{ url('/') }}" class="nav-content-bttn open-font"> <i class="btn-round-md bg-blue-gradiant"><span style="color:rgb(243, 243, 246);margin-bottom:10px;margin-left:10px"><?php echo $icons->getIcon('tv'); ?></span></i><span>Newsfeed</span></a>
                    </li>
                    <li><a title="popular pages" href="{{ route('pages') }}" class="nav-content-bttn open-font"><i class="btn-round-md bg-red-gradiant ms-3"><span style="color:rgb(243, 243, 246);margin-top:100px;margin-left:10px"><?php echo $icons->getIcon('award'); ?></span></i><span>Popular Pages</span></a>
                    </li>
                    <li><a title="popular groups" href="{{ route('groups') }}" class="nav-content-bttn open-font"><i class="btn-round-md bg-mini-gradiant ms-3"><span style="color:rgb(243, 243, 246);margin-top:100px;margin-left:10px"><?php echo $icons->getIcon('zap'); ?></span></i><span>Popular
                                Groups</span></a></li>

                </ul>
            </div>


            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                <ul class="mb-1">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li>
                        <a href="{{route('settings')}}" class="nav-content-bttn open-font h-auto pt-2 pb-2">
                            <i class="font-sm ms-3 text-grey-500">
                                <span>
                                    <?php echo $icons->getIcon('settings') ?>
                                </span>
                            </i>
                            <span>Settings</span></a>
                    </li>

                    <li><a href="{{ url('/chat') }}" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm ms-3 text-grey-500"><span><?php echo $icons->getIcon('message-circle') ?></span></i><span>Chats</span>
                            {{-- <span class="circle-count bg-warning mt-0">23</span> --}}
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- end right Bar -->
