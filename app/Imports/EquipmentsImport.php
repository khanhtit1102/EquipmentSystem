<?php

namespace App\Imports;

use App\Equipment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class EquipmentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Equipment([
            'Equip_Number'          => $row['Equipment Number'],
            'Label_Code'            => $row['Label Code'],
            'Name'                  => $row['Name'],
            'Location'              => $row['Location'],
            'Description'           => $row['Description'],
            'Storage_Location'      => $row['Storage_Location'],
            'Declaration_Number'    => $row['Declaration_Number'],
            'id_factory'            => $row['Factory'],
            'id_floor'              => $row['Floor'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
