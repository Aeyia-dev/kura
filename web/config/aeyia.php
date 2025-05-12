<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Klaviyo Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration values for Klaviyo email marketing integration
    |
    */
    'klaviyo' => [
        'api_key' => env('KLAVIO_WEB_SIGNUP_KEY'),
        'society_list_id' => env('KLAVIO_SOCIETY_LISTID'),
        'aeyia_list_id' => env('KLAVIO_AEYIA_LISTID'),
        'sources' => [
            'society' => 'Society Signup Form',
            'aeyia' => 'Aeyia Website Signup Form',
        ],
    ],
];