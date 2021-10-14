<?php

return [
  'paypal' => [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'cliente_secret' => env('PAYPAL_CLIENT_SECRET')
  ],
  'settings' => [
    'mode' => env('PAPYPAL_MODE', 'sandbox'),
    'http.connectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => storage_path('/logs/paypal.log'),
    'log.LogLevel' => 'ERROR'
  ]
];
