<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $tablename = "clients";
    protected $fillable = [
        'name', 'phone_a', 'phone_b', 'email', 'address', 'type', 'cpf_cnpj'
    ];
    
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'client_id');
    }
    public function type(){
        return $this->type == 'j' ? 'Jurídica' : 'Física';
    }
}
