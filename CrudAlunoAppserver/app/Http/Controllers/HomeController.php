<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Client;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;
use App\Equipments;

class HomeController extends Controller
{
    public function index()
    {
        $a = Auth::check();
        if($a){
            $clients = Client::latest()->paginate(15);
            return view('dash.client', ['clients' => $clients]);
        }
        return view('auth.login');
    }
    public function vehicles($user_id = null)
    {
        if(Auth::check()){
            if($user_id){
                $client = Client::find($user_id);
                $client->myVehicles = $client->vehicles()->get();
                $vehicles = $client->myVehicles;
                foreach($vehicles as $vehicle){
                    $vehicle->equipment = $vehicle->equipments()->first();
                }
                return view('dash.vehicles', ['vehicles'=> $vehicles, 'message'=>null]);
            }else{
                $vehicles = Vehicle::paginate(15);
                foreach($vehicles as $vehicle){
                    $vehicle->equipment = $vehicle->equipments()->first();
                }
                return view('dash.vehicles', ['vehicles'=>$vehicles,'message'=>null]);
            }
        }else{
            return redirect('/');
        }
    }
    public function equipments($vehicle_id = null)
    {
        if(Auth::check()){
            if($vehicle_id){
                $vehicle = Vehicle::find($vehicle_id);
                return view('dash.equipments', ['equipments'=>$vehicle]);
            }else{
                $vehicles = Vehicle::paginate(15);
                return view('dash.equipments', ['equipments'=>$vehicles]);
            }
        }else{
            return redirect('/');
        }
    }
    public function findClient(Request $req)
    {
        if(Auth::check()){
            $obj = Client::
                where('email', 'like', '%'. $req->name . '%')
                ->orWhere('name', 'like', '%'. $req->name . '%')
                ->orWhere('address', 'like', '%'.$req->name.'%')
                ->get();
            return view('dash.client', ['clients' => $obj]);
        }else{
            return redirect('/');
        }
    }
    public function findVehicle(Request $req){
        if(Auth::check()){
            $obj = Vehicle::
                where('placa', 'like', '%'.$req->name.'%')
                ->orWhere('model', 'like', '%' . $req->name . '%')
                ->orWhere('brand', 'like', '%'. $req->name . '%')
                ->orWhere('color', 'like', '%'. $req->name . '%')
                ->orWhere('type', 'like', '%'. $req->name . '%')
                ->get();
                foreach($obj as $vehicle){
                    $vehicle->equipment = $vehicle->equipments()->first();
                }
            return view('dash.vehicles', ['vehicles'=>$obj]);
        }else{
            return redirect('/');
        }
    }
}
