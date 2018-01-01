<?php

return [
    'secretKey' => 'LS0tLS1CRUdJTiBQUklWQVRFIEtFWS0tLS0tCk1JSUNkZ0lCQURBTkJna3Foa2lHOXcwQkFRRUZBQVNDQW1Bd2dnSmNBZ0VBQW9HQkFOa0JFQTJpbkIyQ3pNcUIKTS8yMnFWYWxGSXJkR1BHLzFQYm1IZ3FtdnpnNXJuR0JrQkxrTjlVeU1CanhIZ1lxeWlIbmRlN0hlYWQ5SWRTeApML1JoeXNNSkNoQ0l3YW9RU0tEbmpqekRHN1ZUa2c4S1hQc1FVa1hPZUo5cjVOcFZtQzVaU1VvRVFpRVBjNTNvCldHRlhweDUrYzUzUURjM3kwbHlkbDFLSXBidWJBZ01CQUFFQ2dZRUFvWjFxQUUydjZVYW1FTmVEQ2gwRkp4T1IKSmc2ZWFrV05iVWhhN1dIY25ocFBjaGVsWG54N25KdGhPT0l5a3pOQkVWa1ordml6QU90dnk4RWV6dW9hSUNJNwpkRUFHcVU0VkRFYzZ3U3dkSHBiQTBSVUtmOXVHd3JQRFdHWi9DaU5GeUZMYlJqZkVRWFJWUCt3Rk8wMm9XcEcrCkFqb28wQWFvc1JJRTlldnc1bUVDUVFEdW5aV2ZNdGRDdXJOS0VMTG1yWXkvQU16OGJsRlFMZ3F4cUFrUkdmVFIKbzNNVU1GN01ETUVHNzFkV08wdy9hSTlXb0cxUWN2SkJTbGt3eTVGZVA1SHhBa0VBNk5CbmNpUkdyNVUvaTN2KwprUmlGVW1xS2NNVWZyWElCd0U5RWNnSno2MFZuN2djK05iOEM5QjJPdXFsUWcrQ2h1TjJIQWV6emIxRER3TVJrCkZ1dWFTd0pBQnFqRk5UVXhCcjY1SkRjRkZ5VCt5WkhYSnJCWmVwaGVXZ2pyZjl1dWxtOHVWZ0RubEdCQ3Z0UE4KSnkzdWVkS01OWW15bzAwaDc2cUloTEVadEh5bnNRSkFWMXFLMWVzQ2tyTC9Tc2pWZFgrcjFvYWZOenpmYStiUQovV1ZBbXo2TVhBU0l3R2o3VUpOQStuTjBzRmtER3RoWUZkTVk2d0lMUFFNaXo5dGdhckV3RFFKQUxEVjBqcDVwClp0c2pST3hLR3JaQ3NZZGJlbkRxMzQ3Kzk0TTExL1BTdktvRHkwb25qODRaMHd1Rnc1VkFpNUpoOXRWOUhmdkoKRTZIUGtyVk9HbkJ6WXc9PQotLS0tLUVORCBQUklWQVRFIEtFWS0tLS0tCg==';
    'publicKey' => 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHZk1BMEdDU3FHU0liM0RRRUJBUVVBQTRHTkFEQ0JpUUtCZ1FEWkFSQU5vcHdkZ3N6S2dUUDl0cWxXcFJTSwozUmp4djlUMjVoNEtwcjg0T2E1eGdaQVM1RGZWTWpBWThSNEdLc29oNTNYdXgzbW5mU0hVc1MvMFljckRDUW9RCmlNR3FFRWlnNTQ0OHd4dTFVNUlQQ2x6N0VGSkZ6bmlmYStUYVZaZ3VXVWxLQkVJaEQzT2Q2RmhoVjZjZWZuT2QKMEEzTjh0SmNuWmRTaUtXN213SURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=';

    'publickeyServer' => 'http://localhost/sharing-learning-platform/PublickeyAPIServer/public/index.php/api/';
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
