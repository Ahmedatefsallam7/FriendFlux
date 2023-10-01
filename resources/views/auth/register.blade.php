 @extends('layouts.guest')
 @section('title','Register')

 @section('content')
 <div class="preloader"></div>

 <div class="main-wrap">
     <div class="nav-header bg-transparent shadow-none border-0">
         <div class="nav-top w-100">
             <a href="{{ route('register') }}" style="margin-right:1250px">
                 <span class="d-inline-block fredoka-font font-xxl mb-0">
                     {{ config('app.name') }}
                 </span>
             </a>

             {{-- <a style="margin-left: 1100px; background: rgb(65, 65, 141);border:none;border-radius: 10px " class=" header-btn d-none d-lg-block  fw-500 text-white font-xsss p-3 me-auto w100 text-center lh-20" data-bs-toggle="modal" data-bs-target="#Modallogin">Login</a> --}}
         </div>
     </div>

     <div class="row">
         <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(../images/login-bg-2.jpg);"></div>
         <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-scroll">
             <div class="card shadow-none border-0 me-auto ms-auto login-card">
                 <div class="card-body rounded-0 text-left">
                     <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                         @csrf
                         <br><br><br><br><br><br><br><br>
                         <h2 style="color: rgb(65, 65, 141);" class="fw-700 display1-size display2-md-size mb-2">Create Your Account</h2>

                         @if ($errors->any())
                         <br><br><br>
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                         @endif
                         <div class="form-group  mb-3">
                             <input type="text" minlength="3" name="first_name" value="{{ old('first_name') }}" class="style2-input pe-3 form-control text-grey-900 font-xsss fw-600" placeholder="Your First Name" autofocus required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                         </span>

                         <div class="form-group  mb-3">
                             <input type="text" name="last_name" minlength="3" value="{{ old('last_name') }}" class="style2-input pe-3 form-control text-grey-900 font-xsss fw-600" placeholder="Your Last Name" required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                         </span>

                         <div class="form-group  mb-3">
                             <input type="text" minlength="3" name="user_name" value="{{ old('user_name') }}" class="style2-input pe-3 form-control text-grey-900 font-xsss fw-600" placeholder="Your Username" required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                         </span>

                         <div style="margin-bottom:20px;margin-right:120px">
                             <a href="#" onclick="Type('email','email','Your Email Address')" style="margin:10px;background: rgb(65, 65, 141);color: white;padding: 7px;border: none;border-radius:12px; ">Email</a>
                             OR <a href="#" onclick="Type('mobile','tel','Your Mobile Number')" style="margin:10px; background: rgb(65, 65, 141);color: white;padding: 7px;border: none;border-radius:10px; ">
                                 Mobile</a>
                         </div>

                         <div class="form-group  mb-3">
                             <input type="email" name="email" id="email_or_mobile" value="{{ old('email') }}" class="style2-input pe-3 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" required>
                             <span style="color: red">
                                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                 <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                             </span>
                             <script>
                                 function Type(name, ty, place) {
                                     let typ = document.querySelector("#email_or_mobile")
                                     typ.name = name;
                                     typ.type = ty;
                                     typ.placeholder = place;
                                 }

                             </script>
                         </div>

                         <div class="form-group  mb-3">
                             <input type="password" name="password" class="style2-input pe-3 form-control text-grey-900 font-xss ls-3" placeholder="Password" required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('password')" class="mt-2" />
                         </span>


                         <div class="form-group mb-1">
                             <input type="password" name="password_confirmation" class="style2-input pe-3 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password" required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                         </span>

                         <label for="gen" style="margin-right:340px"> Gender</label>
                         <div id="gen" class="mb-3 form-control">
                             <span>
                                 <label for="male">Male</label>
                                 <input id="male" type="radio" name="gender" value="male" required>
                             </span>
                             <span>
                                 <label for="female">Female</label>
                                 <input id="female" type="radio" name="gender" value="female" required>
                             </span>
                         </div>
                         <div style="color: red">
                             <x-input-error :messages="$errors->get('gender')" />
                         </div>


                         <div style="margin-top: -5px">
                             <label for="profile" style="margin-right:340px">Profile</label>
                             <input type="file" class="form-control" id="profile" name="profile" value="{{ old('profile') }}" required>
                         </div>
                         <span style="color: red">
                             <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                         </span>

                         <div class="form-check text-left mt-3 mb-3">
                             <input style="display:inline-block" type="checkbox" name="terms" class="form-check-input mt-2" id="exampleCheck2" required>
                             <label style="display:inline-block;margin-right:150px " class="form-check-label font-xsss text-grey-500" for="exampleCheck2">Accept
                                 Term and Conditions</label>
                             <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                         </div>
                         <div class="col-sm-12 p-0 text-left">
                             <div class="form-group mb-1"><input type="submit" style="background: rgb(65, 65, 141);" class="form-control text-center style2-input text-white fw-600  border-0 p-0 " value="Register">
                             </div>
                             <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="{{ route('login') }}" style="color: rgb(65, 65, 141);" class="me-1">Login</a></h6>
                         </div>
                     </form>


                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Login -->
 {{-- <div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content border-0">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
             <div class="modal-body p-3 d-flex align-items-center bg-none">
                 <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                     <div class="card-body rounded-0 text-left p-3">
                         <h2 class="fw-700 display1-size display2-md-size mb-4">Login into <br>your account</h2>
                         <form>

                             <div class="form-group icon-input mb-3">
                                 <i class="font-sm ti-email text-grey-500 ps-0"></i>
                                 <input type="text" class="style2-input pe-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address">
                             </div>
                             <div class="form-group icon-input mb-1">
                                 <input type="Password" class="style2-input pe-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                 <i class="font-sm ti-lock text-grey-500 ps-0"></i>
                             </div>
                             <div class="form-check text-left mb-3">
                                 <input type="checkbox" class="form-check-input mt-2" id="exampleCheck4">
                                 <label class="form-check-label font-xsss text-grey-500" for="exampleCheck4">Remember
                                     me</label>
                                 <a href="forgot.html" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot
                                     your
                                     Password?</a>
                             </div>
                         </form>

                         <div class="col-sm-12 p-0 text-left">
                             <div class="form-group mb-1"><a href="#" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</a>
                             </div>
                             <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="register.html" class="fw-700 me-1">Register</a></h6>
                         </div>
                         <div class="col-sm-12 p-0 text-center mt-3 ">

                             <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4">Or, Sign
                                 in with your social account </h6>
                             <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img src="../images/icon-1.png" alt="icon" class="ms-2 w40 mb-1 ms-5">
                                     Sign in with Google</a></div>
                             <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img src="../images/icon-3.png" alt="icon" class="ms-2 w40 mb-1 ms-5">
                                     Sign in with Facebook</a></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}
 @endsection
