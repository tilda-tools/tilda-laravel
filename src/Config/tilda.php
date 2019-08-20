<?php

return [
    'api' => [
        'endpoint' => env('TILDA_API_ENDPOINT'),
        'publicKey' => env('TILDA_API_PUBLIC_KEY'),
        'secretKey' => env('TILDA_API_SECRET_KEY'),
    ],
    'path' => env('TILDA_PATH'),
    'cssPath' => env('TILDA_CSS_PATH'),
    'jsPath' => env('TILDA_JS_PATH'),
    'imagesPath' => env('TILDA_IMAGES_PATH'),
    'projects' => explode(',', env('TILDA_PROJECTS', '')),
];
