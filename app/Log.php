<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table='log';

    public function dms()
    {
        return $this->belongsTo('App\Dms','tabla_dms_idpdv','idpdv');
    }

    public function user()
    {
        return $this->belongsTo('App\User','for_users_id','id');
    }
}
