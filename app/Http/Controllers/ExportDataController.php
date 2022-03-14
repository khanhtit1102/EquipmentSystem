<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentsExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportDataController extends Controller
{
    public function Equipments()
    {
        return Excel::download(new EquipmentsExport, 'Equipments_'. Carbon::now()->toDateTimeString().'.xlsx');
    }
}
