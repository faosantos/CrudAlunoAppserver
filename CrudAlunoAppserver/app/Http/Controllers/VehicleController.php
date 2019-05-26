<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Validator;
use Illuminate\Http\Request;
use App\Equipments;
use Auth;

class VehicleController extends Controller
{
    public function destroy($id)
    {
        if(Auth::check()){
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->delete();
            return redirect('/veiculos?success=true');
        }else{
            return redirect('/');
        }
    }
    public function create($user_id)
    {
        if(Auth::check()){
            return view('dash.vehicles.form', ['err'=>[], 'client'=>$user_id]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request, $user_id)
    {
        if(Auth::check()){
            $valid = [
                'placa'         => 'required|string|unique:vehicles',
                'brand'         => 'required|string',
                'color'         => 'required|string',
                'model'         => 'required',
                'year'          => 'required',
                'type'          => 'required',
                'serial_num'    => 'required',
                'equip_model'         => 'required',
                'chip_num'      => 'required',
                'phone_num'     => 'required',
                'operator'      => 'required',
                'apn'           => 'required'
            ];
            $messages = [
                'required' => 'Este campo precisa ser preenchido.',
                'placa.unique' => 'A placa fornecida já existe em nosso banco de dados'
            ];
            $validator = Validator::make($request->all(), $valid, $messages);
            if ($validator->fails()) {
                return view('dash.vehicles.form', ['err' => $validator->errors()->toArray(), 'client'=>$user_id]);
            }
            $vehicle = [
                'placa' => $request->placa,
                'brand' => $request->brand,
                'color' => $request->color,
                'model' => $request->model,
                'year' => $request->year,
                'client_id' => $user_id,
                'type' => $request->type
            ];
            $confirm = Vehicle::create($vehicle);
            $equipment = [
                'serial_num'    => $request->serial_num,
                'model'         => $request->equip_model,
                'chip_num'      => $request->chip_num,
                'vehicle_id'    => $confirm->id, 
                'phone_num'     => $request->phone_num,
                'operator'      => $request->operator,
                'apn'           => $request->apn,
                'client_id'     => $confirm->client_id
            ];
            $confirm2 = Equipments::create($equipment);
            if($confirm && $confirm2){
                return redirect('/veiculos');//redirect('/equipamento/' . $confirm->id);
            }else{
                return redirect('/veiculos/add/' . $user_id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
    public function show($id)
    {
        if(Auth::check()){
            $vehicle = Vehicle::findOrFail($id);
            $owner = $vehicle->owner()->first();
            $equipment = $vehicle->equipments()->first();
            return view('dash.vehicles.view', ['owner'=> $owner, 'vehicle'=>$vehicle, 'equipment'=>$equipment]);
        }else{
            return redirect('/');
        }
    }
    public function edit($id)
    {
        if(Auth::check()){
            $vehicle = Vehicle::findOrFail($id);
            $equipment = $vehicle->equipments()->first();
            return view('dash.vehicles.edit', ['vehicle'=>$vehicle, 'equipment'=>$equipment, 'err'=>[]]);
        }else{
            return redirect('/');
        }
    }
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            $valid = [
                'placa'         => 'required|string',
                'brand'         => 'required|string',
                'color'         => 'required|string',
                'model'         => 'required',
                'year'          => 'required',
                'type'          => 'required',
                'serial_num'    => 'required',
                'equip_model'   => 'required',
                'chip_num'      => 'required',
                'phone_num'     => 'required',
                'operator'      => 'required',
                'apn'           => 'required'
            ];
            $messages = [
                'required' => 'Este campo precisa ser preenchido.',
                'placa.unique' => 'A placa fornecida já existe em nosso banco de dados'
            ];
            $validator = Validator::make($request->all(), $valid, $messages);
            if ($validator->fails()) {
                return $validator->errors()->toArray();
            }

            $vehicle    = Vehicle::findOrFail($id);
            $vehicle    ->placa = $request->placa;
            $vehicle    ->brand = $request->brand;
            $vehicle    ->color = $request->color;
            $vehicle    ->model = $request->model;
            $vehicle    ->year = $request->year;
            $success    = $vehicle->save();

            $equip      = $vehicle->equipments()->first();
            $equipId    = $equip->id;

            $equipment  = Equipments::findOrFail($equipId);
            $equipment  ->serial_num = $request->serial_num;
            $equipment  ->chip_num = $request->chip_num;
            $equipment  ->model = $request->equip_model;
            $equipment  ->phone_num = $request->phone_num;
            $equipment  ->operator = $request->operator;
            $equipment  ->apn = $request->apn;
            $success2   = $equipment->save();

            if($success && $success2){
                return redirect('/editar-veiculo/' . $id . '?success=true');
            }else{
                return redirect('/editar-veiculo/' . $id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
}
