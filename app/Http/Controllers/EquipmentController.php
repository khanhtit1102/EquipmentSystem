<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Exports\EquipmentsExport;
use App\Factory;
use App\Floor;
use App\Remind;
use App\TrackingFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with('Factory', 'Floor')->get();
        return view('equipment.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $NewQRCode = $request->session()->get('Qrcode', '');
        $Floors = Floor::all();
        $Factories = Factory::all();
        return view('equipment.create', compact('NewQRCode', 'Floors', 'Factories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipment = new Equipment();
        $equipment->Equip_Number = $request->Equip_Number ?? "";
        $equipment->Label_Code = $request->Label_Code ?? "";
        $equipment->Name = $request->Name ?? "";
        $equipment->Location = $request->Location ?? "";
        $equipment->Description = $request->Description ?? "";
        $equipment->Storage_Location = $request->Storage_Location ?? "";
        $equipment->Declaration_Number = $request->Declaration_Number ?? "";
        $equipment->id_factory = $request->Factory ?? 1;
        $equipment->id_floor = $request->Floor ?? 1;
        if ($equipment->Name == "" || $equipment->Label_Code == "") {
            return redirect()->route('equipment.create')->with('error_message', 'Please fill all required input!');
        }
        $equipment->save();
        return redirect()->route('equipment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_numeric($id)){
            $Equipment = Equipment::findorfail($id);
        }
        else{
            $Equipment = Equipment::where('Label_Code', '=', $id)->first();
            if ($Equipment == null) {
                return redirect()->route('equipment.create')->with('Qrcode', $id);
            }
        }
        $Floors = Floor::all();
        $Factories = Factory::all();
        return view('equipment.edit', compact('Equipment', 'Floors', 'Factories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipment = Equipment::find($id);
        $equipment->Equip_Number = $request->Equip_Number ?? "";
        $equipment->Label_Code = $request->Label_Code ?? "";
        $equipment->Name = $request->Name ?? "";
        $equipment->Location = $request->Location ?? "";
        $equipment->Description = $request->Description ?? "";
        $equipment->Storage_Location = $request->Storage_Location ?? "";
        $equipment->Declaration_Number = $request->Declaration_Number ?? "";
        $equipment->id_factory = $request->Factory ?? 1;
        $equipment->id_floor = $request->Floor ?? 1;
        if ($equipment->Name == "" || $equipment->Label_Code == "") {
            return redirect()->route('equipment.edit', $id);
        }
        $equipment->save();
        return redirect()->route('equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipment::findOrFail($id)->delete();
        return redirect()->route('equipment.index');
    }
}
