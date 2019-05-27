<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Aluno;
use Illuminate\Support\Facades\Auth;
use App\Turma;
use App\Equipments;

class HomeController extends Controller
{
    public function index()
    {
        $a = Auth::check();
        if($a){
            $alunos = Aluno::latest()->paginate(15);
            return view('dash.aluno', ['alunos' => $alunos]);
        }
        return view('auth.login');
    }
    public function turmas($user_id = null)
    {
        if(Auth::check()){
            if($user_id){
                $aluno = Aluno::find($user_id);
                $aluno->myTurmas = $aluno->turmas()->get();
                $turmas = $aluno->myTurmas;
                foreach($turmas as $turma){
                    $turma->equipment = $turma->equipments()->first();
                }
                return view('dash.turmas', ['turmas'=> $turmas, 'message'=>null]);
            }else{
                $turmas = Turma::paginate(15);
                foreach($turmas as $turma){
                    $turma->equipment = $turma->equipments()->first();
                }
                return view('dash.turmas', ['turmas'=>$turmas,'message'=>null]);
            }
        }else{
            return redirect('/');
        }
    }
    public function equipments($turma_id = null)
    {
        if(Auth::check()){
            if($turma_id){
                $turma = Turma::find($turma_id);
                return view('dash.equipments', ['equipments'=>$turma]);
            }else{
                $turmas = Turma::paginate(15);
                return view('dash.equipments', ['equipments'=>$turmas]);
            }
        }else{
            return redirect('/');
        }
    }
    public function findAluno(Request $req)
    {
        if(Auth::check()){
            $obj = Aluno::
                where('email', 'like', '%'. $req->name . '%')
                ->orWhere('name', 'like', '%'. $req->name . '%')
                ->orWhere('address', 'like', '%'.$req->name.'%')
                ->get();
            return view('dash.aluno', ['alunos' => $obj]);
        }else{
            return redirect('/');
        }
    }
    public function findTurma(Request $req){
        if(Auth::check()){
            $obj = Turma::
                where('num_aluno', 'like', '%'.$req->name.'%')
                ->orWhere('turma', 'like', '%' . $req->name . '%')
                ->orWhere('serie', 'like', '%'. $req->name . '%')
                // ->orWhere('color', 'like', '%'. $req->name . '%')
                // ->orWhere('type', 'like', '%'. $req->name . '%')
                ->get();
                foreach($obj as $turma){
                    $turma->equipment = $turma->equipments()->first();
                }
            return view('dash.turmas', ['turmas'=>$obj]);
        }else{
            return redirect('/');
        }
    }
}
