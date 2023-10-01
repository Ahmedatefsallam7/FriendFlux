@extends('layouts.guest');
@section('title')
verify mobile number
@endsection
@section('content')
<div class="container" style="background-color: rgb(230, 230, 244);border:none;border-radius:7px">
    <div class="row mt-5">

        <div>
            <div>
                <p class="text-center" style="text-decoration-style: bold">
                    {{ __('Thanks for signing up! Before getting started,')}}
                    <br>
                    {{ ('could you verify your mobile number by writing the OTP with 6 digits we just sent to you')}}
                    <br>{{ (' If you didn\'t receive the SMS, click Resend')}}
                </p>
                @if (session('status') == 'verification-link-sent')
                <div style="color: green;margin-right: 300px">
                    {{ __('A new OTP has been sent to the mobile number you provided during registration.') }}
                </div>
                @endif

            </div>
        </div>

        @if (session()->has('errorOTP'))
        <p style="color: red;margin-left:-640px;margin-bottom:-20px"> * {{ session()->get('errorOTP') }}</p>
        @endif

        <div class="mt-4 flex " style="margin-left: -500px">


            <form method="POST" action="{{ route('mobile_verification.verify') }}" style="display: inline-block">
                @csrf

                <div style="margin-right:-150px" class="form-group  mb-3 ">
                    <input type="text" class="form-control" name='otp' placeholder="Enter OTP" autofocus>
                </div>
                <x-input-error :messages="$errors->get('otp')" style="color:rgb(225, 23, 23);margin:10px" />

                <button style="padding: 5px;color: white;background-color: rgb(19, 199, 58);border: none;border-radius: 10px" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Verify') }}
                </button>
            </form>

            <form method="POST" action="{{ route('mobile-verification-reSend') }}" style="display: inline-block">
                @csrf

                <span>
                    <button style="padding: 5px;color: white;background-color: rgb(94, 94, 202);border: none;border-radius: 10px">
                        {{ __('Resend OTP') }}
                    </button>
                </span>
            </form>

            <form method="POST" action="{{ route('logout') }}" style="display: inline-block">
                @csrf

                <button style="padding: 5px;color: white;background-color: rgb(228, 48, 57);border: none;border-radius: 10px" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>


        </div>
    </div>

</div>

</div>

@endsection
