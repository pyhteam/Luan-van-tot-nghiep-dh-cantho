<?php

namespace Helper;
require_once('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use SplFileInfo;

class ExcelHelper
{
    private $excelFile;

    public function __construct($excelFile)
    {
        if ($excelFile instanceof SplFileInfo) {
            $this->excelFile = $excelFile->getPathname();
        } elseif (is_string($excelFile)) {
            $this->excelFile = $excelFile;
        } else {
            throw new \InvalidArgumentException("Invalid input. Must be SplFileInfo or string.");
        }
    }

    public function readExcel()
    {
        $dataList = [];

        $spreadsheet = IOFactory::load($this->excelFile);
        $sheet = $spreadsheet->getActiveSheet();

        $header = [];
        foreach ($sheet->getRowIterator() as $rowIndex => $row) {
            $rowData = $this->getRowData($row);
            if ($rowIndex === 1) {
                $header = $rowData;
                continue;
            }
            $dataList[] = (object)array_combine($header, $rowData);
        }

        return $dataList;
    }

    private function getRowData($row)
    {
        $rowData = [];

        foreach ($row->getCellIterator() as $cell) {
            $rowData[] = $cell->getValue();
        }

        return $rowData;
    }
}