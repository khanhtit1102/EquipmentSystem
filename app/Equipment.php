<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{
    public function Factory()
    {
        return $this->belongsTo(Factory::class, 'id_factory', 'id');
    }
    public function Floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor', 'id');
    }
}
