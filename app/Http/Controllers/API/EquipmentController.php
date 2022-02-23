<?php

namespace App\Http\Controllers\API;

use App\Equipment;
use App\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentWithFactory = Equipment::with('Factory', 'Floor')->get();
        return $this->jsonResponse($equipmentWithFactory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $equipment->id_factory = $request->id_factory ?? 1;
        $equipment->id_floor = $request->id_floor ?? 1;
        if ($equipment->Name == "") {
            $equipment->error_message = 'Please fill all required input!';
            return $this->jsonResponse($equipment, 202);
        }
        $equipment->save();
        return $this->jsonResponse($equipment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);
        return $this->jsonResponse($equipment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $equipment->id_factory = $request->id_factory ?? 1;
        $equipment->id_floor = $request->id_floor ?? 1;
        if ($equipment->Name == "") {
            $equipment->error_message = 'Please fill all required input!';
            return $this->jsonResponse($equipment, 202);
        }
        $equipment->save();
        return $this->jsonResponse($equipment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        return $this->jsonResponse(['error_message' => 'Delete complete!'], 200);
    }
}
