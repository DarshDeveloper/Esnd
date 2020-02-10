<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

//    Auth::guard('masnod')->check($credentials)

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'masnod' => [
            'driver' => 'session',
            'provider' => 'masnods',
        ],

        'masnod_api' => [
            'driver' => 'token',
            'provider' => 'masnods',
        ],

        'sand' => [
            'driver' => 'session',
            'provider' => 'sands',
        ],

        'sand_api' => [
            'driver' => 'token',
            'provider' => 'sands',
        ],

        'vmasnod' => [
            'driver' => 'session',
            'provider' => 'vmasnods',
        ],

        'vmasnod_api' => [
            'driver' => 'token',
            'provider' => 'vmasnods',
        ],

        'vsand' => [
            'driver' => 'session',
            'provider' => 'vsands',
        ],

        'vsand_api' => [
            'driver' => 'token',
            'provider' => 'vsands',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'masnods' => [
            'driver' => 'eloquent',
            'model' => App\Masnod::class,
        ],

        'sands' => [
            'driver' => 'eloquent',
            'model' => App\Sand::class,
        ],

        'vmasnods' => [
            'driver' => 'eloquent',
            'model' => App\Vmasnod::class,
        ],

        'vsands' => [
            'driver' => 'eloquent',
            'model' => App\Vsand::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'masnods' => [
            'provider' => 'masnods',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'sands' => [
            'provider' => 'sands',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'vmasnods' => [
            'provider' => 'vmasnods',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'vsands' => [
            'provider' => 'vsands',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
