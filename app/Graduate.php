<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{

    protected $fillable = ['studentCode', 'numberGraduate', 'name', 'description', 'photo', 'type_photo', 'stauts'];

    function getNumberThaiAttribute()
    {
        return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),$this->numberGraduate);
    }
}
