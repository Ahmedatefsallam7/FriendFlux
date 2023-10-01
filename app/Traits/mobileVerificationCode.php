<?php

namespace App\Traits;

use App\Models\User;

trait mobileVerificationCode
{ 
    function sendCode(User $user)
    {
        User::find(auth()->id());
        $otp = random_int(100000, 999999);
        $user->mobile_verification_code = $otp;
        $user->save();
    }
}