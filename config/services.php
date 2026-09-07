<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'ccavenue' => [
        'merchant_id' => env('CCAVENUE_MERCHANT_ID', '4438174'),
        'access_code' => env('CCAVENUE_ACCESS_CODE', 'AVQM90ND88AU58MQUA'),
        'working_key' => env('CCAVENUE_WORKING_KEY', '23E5332DE7E9D33452155CD40C048001'),
        'environment' => env('CCAVENUE_ENVIRONMENT', 'PRODUCTION'),
        'action_url' => env('CCAVENUE_ENVIRONMENT', 'PRODUCTION') === 'PRODUCTION'
            ? 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
            : 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction',
    ],

];
