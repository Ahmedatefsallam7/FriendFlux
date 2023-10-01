@section('title','Settings')
<div class="main-content bg-lightblue theme-dark-bg right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-lg-5 p-4 w-100 border-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-right mb-4 font-xxl fw-700 mont-font mb-lg-5 mb-4 font-md-xs">
                                    Settings</h4>
                                <div class="nav-caption fw-600 font-xssss text-grey-500 mb-2">Genaral</div>
                                <ul class="list-inline mb-4">
                                    <li class="list-inline-item d-block border-bottom me-0">
                                        <a href="{{route('settings.account_information')}}" class="pt-2 pb-2 d-flex align-items-center">
                                            <i class="btn-round-md bg-primary-gradiant text-white font-md ms-3">
                                                <span> {!! $icons->getIcon('home') !!}</span>
                                            </i>
                                            <h4 class="fw-600 font-xsss mb-0 mt-0">Account Information</h4>
                                        </a>
                                    </li>
                                    <li class="list-inline-item d-block border-bottom me-0">
                                        <a href="{{ route('saved-posts') }}" class="pt-2 pb-2 d-flex align-items-center">
                                            <i class="btn-round-md bg-gold-gradiant text-white font-md ms-3">
                                                <span> <?php echo $icons->getIcon('bookmark') ?></span>
                                            </i>
                                            <h4 class="fw-600 font-xsss mb-0 mt-0">Saved Posts</h4>
                                        </a>
                                    </li>
                                    <li class="list-inline-item d-block border-bottom me-0">
                                        <a href="{{ route('social') }}" class="pt-2 pb-2 d-flex align-items-center">
                                            <i class="btn-round-md bg-danger text-white font-md ms-3">
                                                <span> <?php echo $icons->getIcon('link') ?></span>
                                            </i>
                                            <h4 class="fw-600 font-xsss mb-0 mt-0">Social Acocunts</h4>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content -->
