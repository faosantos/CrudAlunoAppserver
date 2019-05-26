@extends('layouts.dash')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Painel de controle
                </li>
                <li class="breadcrumb-item active">Veículos</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">Editar veículo e equipamento</div>
                <div class="card-body">
                    @if (array_key_exists('success', $_GET) && $_GET['success'] == 'true')
                    <div class="alert alert-success">
                        Alterado com sucesso
                    </div>
                    @else
                        @if (array_key_exists('success', $_GET) && $_GET['success'] == 'false')
                            <div class="alert alert-danger">
                                Não foi possível alterar este veículo
                            </div>
                        @else
                        @endif
                    @endif
                    <form method="POST" action="/veiculo-update/{{$vehicle['id']}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="placa">Placa<span style="color: red;">*</span></label>
                                    <input value="{{$vehicle->placa}}" type="text" maxlength="7" class="form-control" required name="placa" id="placa" placeholder="Digite a placa do veículo">
                                    @if($err && array_key_exists('placa', $err))
                                        @foreach ($err['placa'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="brand">Marca<span style="color: red;">*</span></label>
                                    <input value="{{$vehicle->brand}}" type="text" maxlength="50" class="form-control" required name="brand" id="brand" placeholder="Digite a marca do veículo">
                                    @if($err && array_key_exists('brand', $err))
                                        @foreach ($err['brand'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input value="{{$vehicle->model}}" type="text" maxlength="50" class="form-control" required name="model" id="model" placeholder="Digite o modelo do veículo">
                                    @if($err && array_key_exists('model', $err))
                                        @foreach ($err['model'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="color">Cor<span style="color: red;">*</span></label>
                                    <input value="{{$vehicle->color}}" type="text" maxlength="50" class="form-control" required name="color" id="color" placeholder="Digite a cor do veículo">
                                    @if($err && array_key_exists('color', $err))
                                        @foreach ($err['color'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="year">Ano<span style="color: red;">*</span></label>
                                    <input value="{{$vehicle->year}}" type="text" maxlength="4" class="form-control" required name="year" id="year" placeholder="Digite o ano do veículo">
                                    @if($err && array_key_exists('year', $err))
                                        @foreach ($err['year'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipo de veículo <span style="color: red;">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                        <option 
                                            {{$vehicle->type == 'car' ? "selected" : null}}
                                            value="car">Carro</option>
                                        <option 
                                            {{$vehicle->type == 'bike' ? "selected" : null}}
                                            value="bike">Moto</option>
                                        <option
                                            {{$vehicle->type == 'truck' ? "selected" : null}}
                                            value="truck">Caminhão</option>
                                        <option
                                            {{$vehicle->type == 'utility' ? "selected" : null}}
                                            value="utility">Utilitário</option>
                                    </select>
                                    @if($err && array_key_exists('type', $err))
                                        @foreach($err['type'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="serial_num">Número de série do equipamento<span style="color: red;">*</span></label>
                                    <input value="{{$equipment->serial_num}}" type="text" class="form-control" name="serial_num" id="serial_num"  placeholder="Digite o número de serie do equipamento">
                                    @if($err && array_key_exists('serial_num', $err))
                                        @foreach ($err['serial_num'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="equip_model">Modelo do equipamento<span style="color: red;">*</span></label>
                                    <input value="{{$equipment->model}}" type="text" class="form-control" name="equip_model" id="equip_model" placeholder="Digite o modelo do equipamento">
                                    @if($err && array_key_exists('equip_model', $err))
                                        @foreach ($err['equip_model'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="chip_num">ICCID <span style="color: red;">*</span></label>
                                    <input value="{{$equipment->chip_num}}" type="text" class="form-control" name="chip_num" id="chip_num"  placeholder="Digite o número de chip do equipamento">
                                    @if($err && array_key_exists('chip_num', $err))
                                        @foreach ($err['chip_num'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="operator">Operadora <span style="color: red;">*</span></label>
                                    <input value="{{$equipment->operator}}" type="text" class="form-control" name="operator" id="operator"  placeholder="Digite aqui a operadora">
                                    @if($err && array_key_exists('operator', $err))
                                        @foreach ($err['operator'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="apn">APN <span style="color: red;">*</span></label>
                                    <input value="{{$equipment->apn}}" type="text" class="form-control" name="apn" id="apn"  placeholder="APN">
                                    @if($err && array_key_exists('apn', $err))
                                        @foreach ($err['apn'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone_num">Número <span style="color: red;">*</span></label>
                                    <input value="{{$equipment->phone_num}}" type="text" class="form-control" name="phone_num" id="phone_num"  placeholder="Digite aqui o número do chip">
                                    @if($err && array_key_exists('phone_num', $err))
                                        @foreach ($err['phone_num'] as $item)
                                            <small class="text-danger">{{$item}}</small>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">
                            <i class="fa fa-edit"></i>
                            Confirmar
                        </button>
                    </form>
                </div>
                <div class="card-footer"></div>
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