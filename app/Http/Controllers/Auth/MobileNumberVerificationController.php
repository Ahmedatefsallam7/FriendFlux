<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class MobileNumberVerificationController extends Controller
{
    function verify_mobile()
    {
        return view('auth.verify_mobile_number');
    }
    function verify_mobile_number(Request $request)
    {
        $request->validate([
            'otp' => 'required|max:6',
        ]);

        $user = User::find(auth()->id());
        if ($user->mobile_verification_code === $request->otp) {
            $user->mobile_verified_at = now();
            $user->save();
            return redirect(RouteServiceProvider::HOME);
        } else {
            session()->flash('errorOTP', 'Invalid OTP');
            return redirect()->back();
        }
    }
    function resendOTP()
    {
        $user = User::find(auth()->id());

        $sid = env("TWILIO_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $client = new Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
        $client->messages->create(
            // The mobile number you'd like to send the message to
            $user->mobile,
            [
                // A Twilio phone number you purchased at https://console.twilio.com
                'from' => '+14847490416',
                // The body of the text message you'd like to send
                'body' => "Thank you for register to our application " . config('app.name') . "\n your OTP is $user->mobile_verification_code",
            ]
        );
        return redirect(RouteServiceProvider::VERIFY_MOBILE);
    }
}
