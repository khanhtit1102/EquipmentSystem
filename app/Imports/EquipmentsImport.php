<?php

namespace App\Imports;

use App\Equipment;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipmentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipment([
            'Equip_Number'          => $row[0],
            'Label_Code'            => $row[1],
            'Name'                  => $row[2],
            'Location'              => $row[3],
            'Description'           => $row[4],
            'Storage_Location'      => $row[5],
            'Declaration_Number'    => $row[6],
            'id_factory'            => $row[7],
            'id_floor'              => $row[8],
        ]);
    }
}
