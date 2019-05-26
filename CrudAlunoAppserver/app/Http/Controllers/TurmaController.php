<?php

namespace App\Http\Controllers;

use App\Turma;
use Validator;
use Illuminate\Http\Request;
use App\Equipments;
use Auth;

class VehicleController extends Controller
{
    public function destroy($id)
    {
        if(Auth::check()){
            $turma = Turma::findOrFail($id);
            $turma->delete();
            return redirect('/turmas?success=true');
        }else{
            return redirect('/');
        }
    }
    public function create($aluno_id)
    {
        if(Auth::check()){
            return view('dash.turmas.form', ['err'=>[], 'turma'=>$aluno_id]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request, $aluno_id)
    {
        if(Auth::check()){
            $valid = [
                'num_aluno'         => 'required|string|unique:turmas',
                'turma'         => 'required|string',
                'serie'         => 'required|string',
                // 'model'         => 'required',
                // 'year'          => 'required',
                // 'type'          => 'required',
                // 'serial_num'    => 'required',
                // 'equip_model'         => 'required',
                // 'chip_num'      => 'required',
                // 'phone_num'     => 'required',
                // 'operator'      => 'required',
                // 'apn'           => 'required'
            ];
            $messages = [
                'required' => 'Este campo precisa ser preenchido.',
                'num_aluno.unique' => 'O numero fornecido já existe em nosso banco de dados'
            ];
            $validator = Validator::make($request->all(), $valid, $messages);
            if ($validator->fails()) {
                return view('dash.turmas.form', ['err' => $validator->errors()->toArray(), 'aluno'=>$aluno_id]);
            }
            $turma = [
                'num_aluno' => $request->num_aluno,
                'turma' => $request->turma,
                'serie' => $request->serie
                // 'model' => $request->model,
                // 'year' => $request->year,
                // 'aluno_id' => $aluno_id,
                // 'type' => $request->type
            ];
            $confirm = Turma::create($turma);
            // $equipment = [
            //     'serial_num'    => $request->serial_num,
            //     'model'         => $request->equip_model,
            //     'chip_num'      => $request->chip_num,
            //     'vehicle_id'    => $confirm->id, 
            //     'phone_num'     => $request->phone_num,
            //     'operator'      => $request->operator,
            //     'apn'           => $request->apn,
            //     'client_id'     => $confirm->client_id
            // ];
            // $confirm2 = Equipments::create($equipment);
            // if($confirm && $confirm2){
            if($confirm){    
                return redirect('/turmas');//redirect('/equipamento/' . $confirm->id);
            }else{
                return redirect('/turmas/add/' . $aluno_id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
    public function show($id)
    {
        if(Auth::check()){
            $turma = Turma::findOrFail($id);
            $owner = $turma->owner()->first();
            // $equipment = $turma->equipments()->first();
            // return view('dash.turmas.view', ['owner'=> $owner, 'turma'=>$turma, 'equipment'=>$equipment]);
            return view('dash.turmas.view', ['owner'=> $owner, 'turma'=>$turma]);
        }else{
            return redirect('/');
        }
    }
    public function edit($id)
    {
        if(Auth::check()){
            $turma = Turma::findOrFail($id);
            // $equipment = $turma->equipments()->first();
            // return view('dash.vehicles.edit', ['vehicle'=>$vehicle, 'equipment'=>$equipment, 'err'=>[]]);
            return view('dash.turmas.edit', ['turma'=>$turma, 'err'=>[]]);
        }else{
            return redirect('/');
        }
    }
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            $valid = [
                'num_aluno'         => 'required|string',
                'turma'         => 'required|string',
                'serie'         => 'required|string'
                // 'model'         => 'required',
                // 'year'          => 'required',
                // 'type'          => 'required',
                // 'serial_num'    => 'required',
                // 'equip_model'   => 'required',
                // 'chip_num'      => 'required',
                // 'phone_num'     => 'required',
                // 'operator'      => 'required',
                // 'apn'           => 'required'
            ];
            $messages = [
                'required' => 'Este campo precisa ser preenchido.',
                'num_aluno.unique' => 'O numero fornecido já existe em nosso banco de dados'
            ];
            $validator = Validator::make($request->all(), $valid, $messages);
            if ($validator->fails()) {
                return $validator->errors()->toArray();
            }

            $turma    = Turma::findOrFail($id);
            $turma    ->num_aluno = $request->num_aluno;
            $turma    ->turma = $request->turma;
            $turma    ->serie = $request->serie;
            // $turma    ->model = $request->model;
            // $turma    ->year = $request->year;
            $success    = $turma->save();

            // $equip      = $vehicle->equipments()->first();
            // $equipId    = $equip->id;

            // $equipment  = Equipments::findOrFail($equipId);
            // $equipment  ->serial_num = $request->serial_num;
            // $equipment  ->chip_num = $request->chip_num;
            // $equipment  ->model = $request->equip_model;
            // $equipment  ->phone_num = $request->phone_num;
            // $equipment  ->operator = $request->operator;
            // $equipment  ->apn = $request->apn;
            // $success2   = $equipment->save();

            // if($success && $success2){
            if($success){    
                return redirect('/editar-turma/' . $id . '?success=true');
            }else{
                return redirect('/editar-turma/' . $id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
}
