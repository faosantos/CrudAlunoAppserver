<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ClientController extends Controller
{
    public function create()
    {
        if(Auth::check()){
            $err=['err'=>[]];
            return view('dash.client.form', $err);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request)
    {
        $valid = [
            'name'=> 'required|string',
            'phone_a' => 'required',
            'email'=>'required|unique:clients',
            'address'=>'required',
            'cpf_cnpj'=>'required',
            'type' => 'required'
        ];
        $messages = [
            'required' => 'preencha o campo :attribute',
            'email.unique' => 'Email já utilizado'
        ];
        $validator = Validator::make($request->all(), $valid, $messages);
        if ($validator->fails()) {
            $err = ['err' => $validator->errors()->toArray()];
            return view('dash.client.form', $err);
        }
        $user = [
            'name' => $request->name,
            'phone_a' => $request->phone_a,
            'phone_b' => $request->phone_b ? $request->phone_b : null,
            'email' => $request->email,
            'address' => $request->address,
            'cpf_cnpj' => $request->cpf_cnpj,
            'type' => $request->type === 'Física' ? 'f' : 'j'
        ];
        $user = Client::create($user);
        if($user){
            return redirect('/?success=true');
        }else{
            return redirect('/client/add?success=false&msg=Algo deu errado, confirme os campos e tente novamente');
        }
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $confirm = $client->delete();
        if($confirm)
            return redirect('/?success=2');
        else
            return redirect('/?success=false');
    }
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $vehicles = $client->vehicles()->get();
        return view('dash.client.view', ['client'=> $client, 'vehicles'=>$vehicles]);
    }
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->phone_a = $request->phone_a;
        $client->phone_b = $request->phone_b;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->cpf_cnpj = $request->cpf_cnpj;
        $client->type = $request->type === 'Física' ? 'f' : 'j';
        $success = $client->save();

        if($success){
            return redirect('/client/' . $id . '?success=true');
        }else{
            return redirect('/client/' . $id . '?success=false');
        }
    }
}
