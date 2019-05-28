<?php

namespace App\Http\Controllers;

use App\Equipments;
use Illuminate\Http\Request;
use Validator;
use App\Turma;
use Auth;

class EquipmentController extends Controller
{
    public function destroy($id)
    {
        if(Auth::check()){
            $equipment = Equipments::findOrFail($id);
            $equipment->delete();
            return redirect('/equipamentos?success=true');
        }else{
            return redirect('/');
        }
    }
    public function create($turma_id)
    {
        if(Auth::check()){
            return view('dash.equipments.form', ['err'=>[], 'turma_id'=>$turma_id]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request, $turma_id)
    {
        if(Auth::check()){
            $turma = Turma::where('id', $turma_id)->first(['aluno_id']);
            $equipment = [
                'serial_num'    => $request->serial_num,
                'model'         => $request->equip_model,
                'chip_num'      => $request->chip_num,
                'turma_id'      => $turma_id, 
                'phone_num'     => $request->phone_num,
                'operator'      => $request->operator,
                'apn'           => $request->apn,
                'aluno_id'      => $turma->aluno_id
            ];
            $confirm = Equipments::create($equipment);
            if($confirm){
                return redirect('/turma/'.$turma_id.'?success=3');
            }else{
                return redirect('/equipamento/' . $turma_id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
}
