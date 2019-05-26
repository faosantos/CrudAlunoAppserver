@extends('layouts.dash')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Painel de controle
                </li>
                <li class="breadcrumb-item active">Administrador</li>
            </ol>
            @if (array_key_exists('success', $_GET))
                @switch($_GET['success'])
                    @case('true')
                        <div class="alert alert-success">
                            Técnico adicionado com sucesso.
                        </div>
                        @break
                    @case('false')
                        <div class="alert alert-danger">
                            Algo deu errado, confirme os campos e tente novamente.
                        </div>
                        @break
                    @case('2')
                        <div class="alert alert-success">
                            Técnico excluido com sucesso
                        </div>
                        @break
                    @case('3')
                        <div class="alert alert-danger">
                            Falha ao excluir técnico.
                        </div>
                        @break
                    @default
                @endswitch
            @endif
            <div class="row mb-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Adicionar Administrador
                        </div>
                        <div class="card-body">
                            @include('admin.form')
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <hr>
                    <h4>Técnicos</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $adm)
                                <tr>
                                    <td>{{$adm->name}}</td>
                                    <td>{{$adm->email}}</td>
                                    <td class="dropdown">
                                        <button
                                            id="drop-menu-{{$adm->id}}"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            class="btn btn-outline-dark dropdown-toggle"
                                        >
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="drop-menu-{{$adm->id}}">
                                            <a class="dropdown-item text-danger" href="/delete-user/{{$adm->id}}">
                                                <i class="fa fa-trash"></i>
                                                Deletar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © {{config('app.name')}} {{date('Y', time())}}</span>
                </div>
            </div>
        </footer>
    </div>
@endsection