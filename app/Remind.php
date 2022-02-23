<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Remind extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
