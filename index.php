<?php

// Import composer autoload
// and import package with use ofi\OExcel\OExcel
require 'vendor/autoload.php';

// We use O as aliases
// from OExcel package
    use ofi\OExcel\OExcel as O;

/**
 * In this files we give to you a sample
 * from import excel files
 * using OExcel package
 */

// Define excel files
    $files = str_replace('\\', '/', dirname(__FILE__)) . '/Excel/Email.xlsx';

// Ask for system to turn on debug
// O::DEBUG_OFF(); is best for production
    O::DEBUG_ON();

// Print Prety
echo "<pre>";

    echo "<p> #Get All Sheet </p>";
    print_r(O::getSheet($files));
    
    // === //
    
    echo "<p> #Get Sheet Name (default is index 0) </p>";
    print_r(O::getSheetName($files));
    
    // === //
    
    echo "<p> #Get All Data By Sheet Index (first sheet selected) As array</p>";
    print_r(O::getDataAsArray($files));

    // === //
    
    echo "<p> #Get All Data By Sheet Index (Second sheet selected) As Json</p>";
    print_r(O::getDataAsJson($files, 1));

    // === //
    
    echo "<br><br> <p> #Get All Data By Sheet Index (First sheet selected) As Object</p>";
    print_r(O::getDataAsObject($files, 0));

echo "</pre>";