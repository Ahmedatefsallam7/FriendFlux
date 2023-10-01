@extends('layouts.guest')
@section('title','Login')

@section('content')
    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">

                <a href="" style="margin-right:1250px">
                <span class="d-inline-block fredoka-font font-xxl logo-text">{{ config('app.name') }}
                </span>
                </a>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat"
                 style="background-image: url(../images/login-bg.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 me-auto ms-auto login-card">
                    <div style='margin-top:-100px' class="card-body rounded-0">

                        <form method='post' action="{{ route('login') }}">
                            @csrf

                            <div class="form-group icon-input mb-4">
                                <input id='username_or_mobile' name="user_name" type="text"
                                       value="{{ old('user_name') }}"
                                       class="style2-input pe-3 form-control text-grey-900 font-xsss fw-600"
                                       placeholder="user name" autofocus required>
                                <span style="color: red">
                                <x-input-error :messages="$errors->get('user_name')" class="mt-1"/>
                                 </span>

                                <span style="color: red">
                                <x-input-error :messages="$errors->get('mobile')" class="mt-1"/>
                            </span>

                                <a href="#" onclick='change("numeric","mobile","+2xxxxxxxxxxx")'>
                                    with mobile
                                </a>
                                {{--                                <a style="display:block;" href="#" onclick='change("text","user_name","user name")'>--}}
                                {{--                                    with user_name--}}
                                {{--                                </a>--}}


                            </div>

                            <div class="form-group icon-input mb-1">
                                <input name=password type="Password"
                                       class="style2-input pe-3 form-control text-grey-900 font-xss ls-3"
                                       placeholder="Password" required>
                                <span style="color: red">
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </span>
                            </div>

                            <div class="mb-3">
                            <span>
                                <a class="fw-600 font-xsss text-grey-700 mt-1 float-right"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </span>

                                <span>
                                <input id='r' name='remember' type="checkbox" class="form-check-input mt-2">
                                <label for='r' class="form-check-label font-xsss text-grey-500">Remember me</label>
                            </span>
                            </div>

                            <input style="background: rgb(65, 65, 141);" type='submit' value="Login"
                                   class="form-control text-center style2-input text-white fw-600 border-0 p-0">

                        </form>

                        <div class="col-sm-12 p-0 text-left">
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Don't have account ? <a
                                    style="color:rgb(65, 65, 141)" href="{{ route('register') }}" class="fw-700 me-1">Register</a>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function change(type, name, place) {
            let x = document.querySelector('#username_or_mobile');
            x.type = type;
            x.name = name;
            x.placeholder = place;
        }

    </script>
@endsection
