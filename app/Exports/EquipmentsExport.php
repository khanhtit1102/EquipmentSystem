<?php

namespace App\Exports;

use App\Equipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EquipmentsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Equipment::with('Factory', 'Floor')->get();
    }
    public function map($equipment): array
    {
        return [
            $equipment->id,
            $equipment->Equip_Number,
            $equipment->Label_Code,
            $equipment->Name,
            $equipment->Location,
            $equipment->Description,
            $equipment->Storage_Location,
            $equipment->Declaration_Number,
            $equipment->Factory->factory_name,
            $equipment->Floor->floor_name,
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Equipment Number',
            'Label Code',
            'Name',
            'Location',
            'Description',
            'Storage_Location',
            'Declaration_Number',
            'Factory',
            'Floor',
        ];
    }
}
