<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{
    protected $fillable = [
        'Equip_Number',
        'Label_Code',
        'Name',
        'Location',
        'Description',
        'Storage_Location',
        'Declaration_Number',
        'id_factory',
        'id_floor',
    ];
    
    public function Factory()
    {
        return $this->belongsTo(Factory::class, 'id_factory', 'id');
    }
    public function Floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor', 'id');
    }
}
