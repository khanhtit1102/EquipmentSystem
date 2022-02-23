<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Factory extends Model
{
    public function Equipment()
    {
        return $this->hasMany(Equipment::class, 'id_factory', 'id');
    }
}
