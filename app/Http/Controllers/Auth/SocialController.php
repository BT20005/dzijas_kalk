<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return SocialAccount::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
    $user = SocialAccount::driver($provider)->user();
    }
}