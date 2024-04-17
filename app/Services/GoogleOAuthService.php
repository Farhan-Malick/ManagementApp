<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

class GoogleOAuthService
{
    public static function getGoogleOAuthConfig()
    {
        return [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect' => env('GOOGLE_REDIRECT'),
        ];
    }
}
