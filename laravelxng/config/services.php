<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1032488083491588',
        'client_secret' => '48ed136908ec17100be9bc8d53df8cf4',
        'redirect' => 'http://realtor.coursesaver.com/auth/callback/facebook',
    ],

    'google' => [
        'client_id' => '950458408404-e8vif3u4nrdeafi3kgst8bkvtsglq0n0.apps.googleusercontent.com',
        'client_secret' => 'jJiZl_2bCmrCJDxoy8GJrdkn',
        'redirect' => 'http://realtor.coursesaver.com/auth/callback/google',
    ],
    // Once you set up the client_id and client_secret on google remember to go to
    // https://console.developers.google.com/apis/library?project=***YOUR APP NAME***
    // and click Google+ API and enable it.

    'linkedin' => [
        'client_id' => '7525mwhcjw2t4m',
        'client_secret' => 'YoRX6JaWU2j0zeYP',
        'redirect' => 'http://realtor.coursesaver.com/auth/callback/linkedin',
    ],

    'twitter' => [
        'client_id' => 'fvrrnSKC3qZlPVLRdvpCRFcey',
        'client_secret' => 'DRSM8Ky9aTYzSIE2XGDJaJy2AHDPrwbaVEOrfOzDtZvGYqMOBq',
        'redirect' => 'http://realtor.coursesaver.com/auth/callback/twitter',
    ],
    // Be sure when you create realtor account on twitter to put the Name of the Company for the users name.
    // Else it will read "Authorize 'Jay Lara' to use your account".

    'github' => [
        'client_id' => '3a6a2ed5c4fe2f9f385b',
        'client_secret' => '01d2a9b70f46dae88d4c6712b941c5204b578c6c',
        'redirect' => 'http://realtor.coursesaver.com/auth/callback/github',
    ],

];
