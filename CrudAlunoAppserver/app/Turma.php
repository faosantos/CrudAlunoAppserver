<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $tablename = "turmas";
    protected $fillable = [
        'num_aluno', 'turma', 'serie', 'aluno_id'
    ];
    public function owner()
    {
        return $this->belongsTo('App\Aluno', 'aluno_id', 'id');
    }
    public function equipments(){
        return $this->hasOne('App\Equipments', 'tuma_id', 'id');
    }
}
