<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menuManagement extends Model
{
    public function setNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }
}
