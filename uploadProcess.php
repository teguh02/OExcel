<?php
// Import package
require 'vendor/autoload.php';
use ofi\OExcel\OExcel as O;

O::DEBUG_OFF();

// Html input
// <input type="file" name="excel">
// Catch upload process with this method

$result = O::getFromInputName('excel');

// Print prety
echo "<pre>";
print_r($result);
echo "</pre>";