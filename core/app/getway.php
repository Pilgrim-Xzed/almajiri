<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getway extends Model
{
    public function deposit()
    {
        return $this->hasMany(deposit::class);
    }
}
