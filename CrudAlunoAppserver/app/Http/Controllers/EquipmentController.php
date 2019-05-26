<?php

namespace App\Http\Controllers;

use App\Equipments;
use Illuminate\Http\Request;
use Validator;
use App\Vehicle;
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
    public function create($vehicle_id)
    {
        if(Auth::check()){
            return view('dash.equipments.form', ['err'=>[], 'vehicle_id'=>$vehicle_id]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request, $vehicle_id)
    {
        if(Auth::check()){
            $vehicle = Vehicle::where('id', $vehicle_id)->first(['client_id']);
            $equipment = [
                'serial_num'    => $request->serial_num,
                'model'         => $request->equip_model,
                'chip_num'      => $request->chip_num,
                'vehicle_id'    => $vehicle_id, 
                'phone_num'     => $request->phone_num,
                'operator'      => $request->operator,
                'apn'           => $request->apn,
                'client_id'     => $vehicle->client_id
            ];
            $confirm = Equipments::create($equipment);
            if($confirm){
                return redirect('/veiculo/'.$vehicle_id.'?success=3');
            }else{
                return redirect('/equipamento/' . $vehicle_id . '?success=false');
            }
        }else{
            return redirect('/');
        }
    }
}
