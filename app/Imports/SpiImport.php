<?php

namespace App\Imports;

use App\Spi;
use Maatwebsite\Excel\Concerns\ToModel;

class SpiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Spi([
            'PLAN' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['0']),
            'ACTUAL' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['1']),
            'LO' => $row[2], 
            'TRANSPORTIR' => $row[3], 
            'PERUSAHAAN' => $row[4], 
            'SPA' => $row[5], 
            'NOPOL' => $row[6], 
            'QUANTITY' => $row[7], 
            'KETERANGAN' => $row[8], 
        ]);
    }
}