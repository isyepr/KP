<?php

namespace App\Imports;

use App\Kim;
use Maatwebsite\Excel\Concerns\ToModel;

class KimImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kim([
            'PLANT' =>$row[0],
            'NOPOL' =>$row[1],
            'PERUSAHAAN' =>$row[2], 
            'KIM' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['3']),
        ]);
    }
}