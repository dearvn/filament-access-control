<?php

use Dearvn\FilamentAccessControl\Models\FilamentUser;

return [
    /*
    |--------------------------------------------------------------------------
    | List of enabled features
    |--------------------------------------------------------------------------
    | The following features are available:
    | \Dearvn\FilamentAccessControl\Enumerators\Feature::ACCOUNT_EXPIRY
    | \Dearvn\FilamentAccessControl\Enumerators\Feature::TWO_FACTOR
    */
    'features' => [
        //        \Dearvn\FilamentAccessControl\Enumerators\Feature::ACCOUNT_EXPIRY,
        //        \Dearvn\FilamentAccessControl\Enumerators\Feature::TWO_FACTOR,
    ],

    /*
    |--------------------------------------------------------------------------
    | Date Format
    |--------------------------------------------------------------------------
    | Display format for datepicker
    */
    'date_format' => 'd.m.Y',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    | User model used for admin access and management.
    */
    'user_model' => FilamentUser::class,
];
