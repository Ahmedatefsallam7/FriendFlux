<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
{{-- @extends('layouts.guest')
@section('title','Forget Password')

@section('content')
<div class="preloader"></div>

<div class="main-wrap">


    <div class="nav-header bg-transparent shadow-none border-0">
        <div class="nav-top w-100">
            <a href="" style="margin-right:1250px">
                <span class="d-inline-block fredoka-font font-xxl mb-0">
                    {{ config('app.name') }}
</span>
</a>
<a href="#" class="mob-menu me-auto ms-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
<a href="default-video.html" class="mob-menu"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
<a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
<button class="nav-menu ms-0 me-2"></button>
</div>
</div>

<div class="row">
    <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(../images/login-bg-2.jpg);"></div>
    <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
        <div class="card shadow-none border-0 me-auto ms-auto login-card">
            <div class="card-body rounded-0 text-left">
                <h2 class="fw-700 display1-size display2-md-size mb-4">Change <br>your password</h2>
                <form>


                    <div class="form-group icon-input mb-3">
                        <input type="Password" class="style2-input pe-5 form-control text-grey-900 font-xss ls-3" placeholder="Old Password">
                        <i class="font-sm ti-lock text-grey-500 ps-0"></i>
                    </div>
                    <div class="form-group icon-input mb-1">
                        <input type="Password" class="style2-input pe-5 form-control text-grey-900 font-xss ls-3" placeholder="New Password">
                        <i class="font-sm ti-lock text-grey-500 ps-0"></i>
                    </div>
                    <div class="form-check text-left mb-3">
                        <input type="checkbox" class="form-check-input mt-2" id="exampleCheck4">
                        <label class="form-check-label font-xsss text-grey-500" for="exampleCheck4">Accept Term and Conditions</label>
                        <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                    </div>
                </form>

                <div class="col-sm-12 p-0 text-left">
                    <div class="form-group mb-1"><a href="login.html" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Change Password</a></div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection --}}
