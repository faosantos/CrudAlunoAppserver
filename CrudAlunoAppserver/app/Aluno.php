<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $tablename = "aluno";
    protected $fillable = [
        'name', 'phone_a', 'phone_b', 'email', 'address', 'type', 'cpf_rg'
    ];
    
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'client_id');
    }
    public function type(){
        return $this->type == 't' ? 'Manhã' : 'Tarde';
    }
}
