<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EquipmentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataController extends Controller
{
    public function Equipments()
    {
        return view('equipment.import');
    }
    public function EquipmentUpload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv',
        ]);
        if ($request->hasFile('file')) {

            dd($request);
            Excel::import(new EquipmentsImport, 'users.xlsx');
        }
    }
}
