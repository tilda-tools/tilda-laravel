<?php

return [
    'api' => [
        'endpoint' => env('TILDA_API_ENDPOINT'),
        'publicKey' => env('TILDA_API_PUBLIC_KEY'),
        'secretKey' => env('TILDA_API_SECRET_KEY'),
    ],
    'htmlFileName' => env('TILDA_HTML_FILE_NAME'),
    'path' => env('TILDA_PATH'),
    'projects' => explode(',', env('TILDA_PROJECTS', '')),
];
