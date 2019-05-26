<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    protected $tablename = "equipments";
    protected $fillable = [
        'serial_num', 'model', 'chip_num',
        'phone_num', 'operator', 'apn',
        'vehicle_id', 'client_id'
    ];
}
