<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $admins = User::all();
            return view('admin.create', ['admins'=>$admins]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            $valid = [
                'name'=> 'required|string',
                'email'=>'required|unique:users',
                'password'=>'required|string|confirmed'
            ];
            $messages = [
                'required' => 'preencha o campo :attribute',
                'email.unique' => 'Email já utilizado',
                'password.unique' => 'Senha já utilizada'
            ];
            $validator = Validator::make($request->all(), $valid, $messages);
            if ($validator->fails()) {
                $err = ['err' => $validator->errors()->toArray()];
                return view('dash.user.form', $err);
            }
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
            ];
            $user = User::create($user);
            if($user){
                return redirect('/create-user?success=true');
            }else{
                return redirect('/create-user?success=false');
            }
        }else{
            return redirect('/');
        }
    }
    public function destroy($id)
    {
        if(Auth::check()){
            $user = User::findOrFail($id);
            $confirm = $user->delete();
            if($confirm)
                return redirect('/create-user?success=2');
            else
                return redirect('/create-user?success=3');
        }else{
            return redirect('/');
        }
    }
    public function show($id)
    {
        if(Auth::check()){
            $user = User::findOrFail($id);
            return view('dash.user.view', ['user'=> $user]);
        }else{
            return redirect('/');
        }
    }
}
