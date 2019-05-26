<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $tablename = "vehicles";
    protected $fillable = [
        'placa', 'color', 'model', 'year', 'client_id', 'brand', 'type'
    ];
    public function owner()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }
    public function equipments(){
        return $this->hasOne('App\Equipments', 'vehicle_id', 'id');
    }
}
