<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{

    public function gateway()
    {
        return $this->belongsTo(getway::class, 'gateway_id','id');
    }

}
