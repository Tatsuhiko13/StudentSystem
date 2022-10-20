<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */
    'channels' => [
            'stack' => [
                'driver' => 'stack',
                'channels' => ['debug', 'info', 'error','emergency'],
            ],

            // デバッグログ
            'debug' => [
                'driver' => 'daily',
                'path' => storage_path('logs/debug/debug.log'),
                'level' => 'debug',
                'days' => 7,
                'permission' => 0664,
            ],

            // infoログ
            'info' => [
                'driver' => 'daily',
                'path' => storage_path('logs/info/info.log'),
                'level' => 'info',
                'days' => 7,
                'permission' => 0664,
            ],

            // エラーログ
            'error' => [
                'driver' => 'daily',
                'path' => storage_path('logs/error/error.log'),
                'level' => 'notice',
                'days' => 7,
                'permission' => 0664,
            ],

            // 非常事態ログ
            'emergency' => [
                'driver' => 'daily',
                'path' => storage_path('logs/emergency/emergency.log'),
                'level' => 'emergency',
                'days' => 7,
                'permission' => 0664,
            ],

            'daily' => [
                'driver' => 'daily',
                'path' => storage_path('logs/laravel.log'),
                'level' => 'debug',
                'days' => 14,
            ],

            'slack' => [
                'driver' => 'slack',
                'url' => env('LOG_SLACK_WEBHOOK_URL'),
                'username' => 'Laravel Log',
                'emoji' => ':boom:',
                'level' => 'critical',
            ],

            'papertrail' => [
                'driver'  => 'monolog',
                'level' => 'debug',
                'handler' => SyslogUdpHandler::class,
                'handler_with' => [
                    'host' => env('PAPERTRAIL_URL'),
                    'port' => env('PAPERTRAIL_PORT'),
                ],
            ],

            'stderr' => [
                'driver' => 'monolog',
                'handler' => StreamHandler::class,
                'with' => [
                    'stream' => 'php://stderr',
                ],
            ],

            'syslog' => [
                'driver' => 'syslog',
                'level' => 'debug',
            ],

            'errorlog' => [
                'driver' => 'errorlog',
                'level' => 'debug',
            ],
        ],

    ];
