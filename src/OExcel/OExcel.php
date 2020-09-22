<?php 

namespace ofi\OExcel;
use ofi\OExcel\Excel\Import;
use ofi\OExcel\Excel\Export;
use Exception;

/**
 * OExcel
 * Simple Package for read excel files
 * And for export data to excel
 * 
 * This package is for OFI PHP Framework package
 * and you can use in Native PHP
 * 
 * https://github.com/teguh02/ofi-php-framework/
 * 
 * Thanks for
 * https://github.com/shuchkin/simplexlsx - as import excel
 */

class OExcel extends Import {

    // Import trait export
    use Export;
    
    // Checking for server specification
    public function __construct()
    {
        // is allow_url_fopen is enable?
        if(!ini_get('allow_url_fopen') ) {
            // If not enable, give a error message
            throw new Exception("Please enable allow_url_fopen to get file from external", 500);   
        }
    }

    /**
     * To turn on OExcel debug
     * Default is off
     */

    public static function DEBUG_ON()
    {
        $self = new self();
        ini_set('error_reporting', E_ALL );
        ini_set('display_errors', 1 );
        return $self;
    }

    /**
     * To turn off OExcel debug
     * Default is off
     */
    public static function DEBUG_OFF()
    {
        $self = new self();
        ini_set('display_errors', 0);
        error_reporting(0);
        return $self;
    }

    /**
     * Get all sheet
     */
    public static function getSheet($file)
    {
        $self = new self;

        if(!$sheet = self::parse($file)) {
            if($self->debug) {
                throw new Exception("Invalid file " . $file, 500);
            } else {
                return false;
                die();
            }
        } 

        return $sheet->sheetNames();
    }

    /**
     * To get sheet name by sheet index
     * $file is filename
     * $index is sheet index what do you want
     * default is 0
     */

    public static function getSheetName($file, Int $index = 0)
    {
        if(self::parse($file) -> sheetName($index)) {
            return self::parse($file) -> sheetName($index);
        } else {           
            throw new Exception("Sheet index " . $index . ' not found!', 404);
        }
    }

    /**
     * To get data by sheet index
     * as array
     * Default sheet index is 0
     */

    public static function getDataAsArray($file, Int $index = 0)
    {
        if ( $xlsx = self::parse($file)) {
            // Produce array keys from the array values of 1st array element
            $header_values = $rows = [];

            if(!$sheet = $xlsx->rows($index)) {
                throw new Exception("Sheet " . $index . ' not found', 404);
            }

            foreach ($sheet as $k => $r ) {
                if ( $k === 0 ) {
                    $header_values = $r;
                    continue;
                }
                $rows[] = array_combine( $header_values, $r );
            }
            return (Array) $rows;
        }
    }

    /**
     * To get data as json
     * by sheet index (default is 0)
     */

    public static function getDataAsJson($file, Int $index = 0)
    {
        if ( $xlsx = self::parse($file)) {
            // Produce array keys from the array values of 1st array element
            $header_values = $rows = [];

            if(!$sheet = $xlsx->rows($index)) {
                throw new Exception("Sheet " . $index . ' not found', 404);
            }

            foreach ( $sheet as $k => $r ) {
                if ( $k === 0 ) {
                    $header_values = $r;
                    continue;
                }
                $rows[] = array_combine( $header_values, $r );
            }
            return json_encode($rows);
        }
    }

    /**
     * To get data as object
     * by sheet index (default is 0)
     */

    public static function getDataAsObject($file, Int $index = 0)
    {
        if ( $xlsx = self::parse($file)) {
            // Produce array keys from the array values of 1st array element
            $header_values = $rows = [];

            if(!$sheet = $xlsx->rows($index)) {
                throw new Exception("Sheet " . $index . ' not found', 404);
            }

            foreach ( $sheet as $k => $r ) {
                if ( $k === 0 ) {
                    $header_values = $r;
                    continue;
                }
                $rows[] = array_combine( $header_values, $r );
            }
            return (Object) $rows;
        }
    }

}