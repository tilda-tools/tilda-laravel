<?php

return [
    'path' => [
        'js' => env('TILDA_JS_PATH'),
        'img' => env('TILDA_IMG_PATH'),
        'css' => env('TILDA_CSS_PATH'),
    ],
    'api' => [
        'endpoint' => env('TILDA_API_ENDPOINT'),
        'public_key' => env('TILDA_API_PUBLIC'),
        'secret_key' => env('TILDA_API_SECRET'),
    ]
];