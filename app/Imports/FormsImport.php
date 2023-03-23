<?php

namespace App\Imports;

use App\Models\Regforms;
use Maatwebsite\Excel\Concerns\ToModel;

class FormsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Regforms([
            'name'     => $row[0],
            'gender'    => $row[1],
            'company' => $row[2],
            'role'     => $row[3],
            'email'    => $row[4],
            'mobile' => $row[5],
            'whatsapp'     => $row[6],
            'date_commencing'    => $row[7],
        ]);
    }
}
