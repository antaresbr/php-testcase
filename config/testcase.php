<?php

return [

    'route' => [
        'prefix' => [
            'web' => env('TESTCASE_ROUTE_PREFIX_WEB', 'tests'),
            'api' => env('TESTCASE_ROUTE_PREFIX_API', 'api/tests'),
        ],
    ],

];
