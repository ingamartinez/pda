<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dms extends Model
{

    protected $primaryKey = "idpdv";

    protected $table = 'tabla_dms';

    public function log()
    {
        return $this->hasMany('App\Log','tabla_dms_idpdv','idpdv');
    }

    public function getVisitadoAttribute($value)
    {
        switch ($value){
            case 'N':
                return 'No visitado';
                break;
            case 'S':
                return 'Visitado';
                break;
        }
    }


}
