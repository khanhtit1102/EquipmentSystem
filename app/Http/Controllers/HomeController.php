<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Remind;
use App\TrackingFile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_file = TrackingFile::count();
        $total_size = round(TrackingFile::sum('file_size') / 1000000, 2);
        $total_equip = Equipment::count();
        $reminds = Remind::with('User')->get();
        return view('index', compact('total_file', 'total_size', 'total_equip', 'reminds'));
    }
}