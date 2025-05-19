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

    /*
    |--------------------------------------------------------------------------
    | HubSpot Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration values for HubSpot CRM integration
    |
    */
    'hubspot' => [
        'access_token' => env('HUBSPOT_CONTACT_FORM_SECRET'),
        'sources' => [
            'contact_form' => 'Website Contact Form',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Media Links
    |--------------------------------------------------------------------------
    |
    | Social media profile URLs
    |
    */
    'social' => [
        'instagram' => env('SOCIAL_INSTAGRAM', 'https://www.instagram.com/aeyia__'),
        'facebook' => env('SOCIAL_FACEBOOK', 'http://www.facebook.com/aeyia.au'),
        'youtube' => env('SOCIAL_YOUTUBE', 'https://www.youtube.com/@AEYIAWellness'),
        'tiktok' => env('SOCIAL_TIKTOK', 'http://www.tiktok.com/@aeyia__'),
    ],
];