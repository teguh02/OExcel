<?php

// Import package
require 'vendor/autoload.php';
use ofi\OExcel\OExcel as O;

// Ask for system to turn of debug
// O::DEBUG_ON();
O::DEBUG_OFF();

/**
 * Reference array data
 * https://reqres.in/api/users?page=2
 */

$SecondData = [
    [
        'name' => "Michael",
        'email' => 'michael.lawson@reqres.in',
        'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/follettkyle/128.jpg'
    ],
    [
        'name' => 'Lindsay',
        'email' => 'lindsay.ferguson@reqres.in',
        'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/araa3185/128.jpg',
    ],
    [
        'name' => 'Tobias',
        'email' => 'tobias.funke@reqres.in',
        'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/vivekprvr/128.jpg'
    ]
];

$fileName = 'Export data' . time();
O::ExportFromArray($SecondData);
// O::ExportFromArray($SecondData, $fileName);