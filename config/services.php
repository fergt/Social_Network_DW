<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'token'=>env('EAAFSHTg1mMsBAK28GaIQyNEx5IGZAVfw8W67ZADeVCvJj135hDkZCbP1J99hH8ZCxd4wq74SMtZCQ7BJRKKncZBt4CUG6j5wUPGbK1Kq940ax9gH68ZCzVa67Y6E1fKWPnFUfusontvl3gWy4jwAxzXcxCIc0fh9P0Rfo66ef2ZBKeiETqsDhOFsB3ua1ZCN3D588iT5IC9ZAjaFZBBW2u6IoDVG7QlQ4mGbj1Rt0blPfBvuQZDZD'),
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'http://localhost/Proyecto_UMG_DWeb/Proyecto_UMG_DWeb/public/login/facebbok/callback',
    ],
];
