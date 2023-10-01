<?php

namespace App\Http\Controllers\Auth;

// use Vonage\Client;
use App\Traits\mobileVerificationCode;
use Illuminate\Validation\ValidationException;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;

use Vonage\SMS\Message\SMS;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Vonage\Client\Credentials\Basic;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    use mobileVerificationCode;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:10'],
            'last_name' => ['required', 'string', 'min:3', 'max:10'],
            'user_name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['sometimes', 'string', 'email', 'max:50', 'unique:' . User::class],
            'mobile' => ['sometimes', 'numeric', 'unique:' . User::class],
            'profile' => ['required', 'image', 'mimes:jpg, jpeg, png', 'unique:' . User::class],
            'gender' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile ? '+2' . $request->mobile : null,
            'profile' => $request->profile,
            'gender' => $request->gender,
        ]);

        if ($request->hasFile('profile')) {
            $imgName = $request->file('profile')->getClientOriginalName();
            $request->profile->move(public_path('storage\users\icon\\'), $imgName);

            $path = 'users\icon\\';
            $user->update([
                'profile' => $path . $imgName,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // return redirect('/');

        if ($request->email) {
            $user->email->sendEmailVerificationNotification();
            return redirect(RouteServiceProvider::VERIFY_EMAIL);
        } else {

            $this->sendCode($user);

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
}
