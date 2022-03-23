<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EquipmentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ImportDataController extends Controller
{
    public function Equipments()
    {
        return view('equipment.import');
    }
    public function EquipmentUpload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);
        if ($request->hasFile('file')) {
            Excel::import(new EquipmentsImport, request()->file);
            $failures = "File import completed!";
        }
        else{
            $failures = "File not found or wrong format!";
        }
        return redirect()->route('importdata.equipment')->withErrors(['failures' => $failures]);;
       
    }
}
