<?php

return [

    'passport' => [
        'login_endpoint' => env('PASSPORT_LOGIN_ENDPOINT', env('APP_URL').'/oauth/token'),
        'client_id' => env('PASSPORT_CLIENT_ID'),
        'client_secret' => env('PASSPORT_CLIENT_SECRET'),
    ],


];
