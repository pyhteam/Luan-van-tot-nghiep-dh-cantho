<?php

namespace Helper;
require_once('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use SplFileInfo;

class ExcelHelper
{

    public function __construct()
    {
        
    }

    public function readExcel($excelFile)
    {
        $dataList = [];

        $spreadsheet = IOFactory::load($excelFile);
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

    public function exportExcel($dataList, $filePathSave)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Convert the first array to an object
        $firstItem = (object)$dataList[0];
        $header = array_keys((array)$firstItem);
        $sheet->fromArray($header, NULL, 'A1');

        // Apply styles to header
        $headerRange = 'A1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($header)) . '1';
        $sheet->getStyle($headerRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('2f7dfa'); // Light blue background
            // auto fit width
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        $sheet->getStyle($headerRange)->getFont()->setBold(true); // Bold text

        $sheet->getStyle($headerRange)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK); // Black text

        $data = [];
        foreach ($dataList as $index => $dataItem) {
            // Convert each array to an object
            $dataItem = (object)$dataItem;
            $data[] = array_values((array)$dataItem);
        }
        $sheet->fromArray($data, NULL, 'A2');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePathSave);

        return basename($filePathSave);
    }
}