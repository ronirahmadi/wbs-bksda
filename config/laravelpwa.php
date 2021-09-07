<?php

return [
    'name' => 'Whistleblowing System BKSDA',
    'manifest' => [
        'name' => env('APP_NAME', 'Whistleblowing System BKSDA'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#ffffff',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/img/bksda.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/img/bksda.png',
            '750x1334' => '/img/bksda.png',
            '828x1792' => '/img/bksda.png',
            '1125x2436' => '/img/bksda.png',
            '1242x2208' => '/img/bksda.png',
            '1242x2688' => '/img/bksda.png',
            '1536x2048' => '/img/bksda.png',
            '1668x2224' => '/img/bksda.png',
            '1668x2388' => '/img/bksda.png',
            '2048x2732' => '/img/bksda.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/img/bksda.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
