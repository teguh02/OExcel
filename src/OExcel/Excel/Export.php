<?php

namespace ofi\OExcel\Excel;

trait Export {

    /**
     * ExportFromArray
     * Method to help export array data
     * to excel
     */

    public $defaultFileName = "Export data from excel";

    public static function ExportFromArray(Array $records, $filename = null) {

        ob_clean();
        if(isset($filename)) {
            $namaFile = $filename . ".xlsx";
        } else {
            $self = new self;
            $namaFile = $self->defaultFileName . ".xlsx";
        }

        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$namaFile\"");

        $heading = false;
            if(!empty($records))
              foreach($records as $row) {
                if(!$heading) {
                  // display field/column names as a first row
                  echo implode("\t", array_keys($row)) . "\n";
                  $heading = true;
                }
                echo implode("\t", array_values($row)) . "\n";
            }
        exit;
    }
}