<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '785165447156-7j2iecggoepfkg8b6o29mq36qqvn8mf0.apps.googleusercontent.com',
        'client_secret' => 'cL4TJUqkzc5fD-sEaxv8uqyg',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '1603303956542327',
        'client_secret' => 'd6ffa200b6efea3a8d1c12c7038f4283',
        'redirect' => 'http://learnl52.hd/auth/facebook/callback',
    ],

];
