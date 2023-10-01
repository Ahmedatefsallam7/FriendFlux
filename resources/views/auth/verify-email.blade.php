@extends('layouts.guest');
@section('title')
verify your email
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div>
            <div>
                <p class="text-center" style="text-decoration-style: bold">
                    {{ __('Thanks for signing up! Before getting started,')}}
                    <br>
                    {{ ('could you verify your email address by clicking on the link we just emailed to you')}}
                    <br>{{ (' If you didn\'t receive the email, click Resend')}}
                </p>
                @if (session('status') == 'verification-link-sent')
                <div style="color: green;margin-right: 300px">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif
            </div>
        </div>

        <div class="mt-4 flex " style="margin-left: -500px">

            <form method="POST" action="{{ route('logout') }}" style="display: inline-block">
                @csrf

                <button style="padding: 5px;color: white;background-color: rgb(228, 48, 57);border: none;border-radius: 10px" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>


            <form method="POST" action="{{ route('verification.send') }}" style="display: inline-block">
                @csrf

                <span>
                    <button style="padding: 5px;color: white;background-color: rgb(94, 94, 202);border: none;border-radius: 10px">
                        {{ __('Resend Email Verification') }}
                    </button>
                </span>
            </form>

        </div>
    </div>

</div>

</div>

@endsection
