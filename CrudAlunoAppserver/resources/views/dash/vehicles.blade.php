@extends('layouts.dash')
@section('content')
    @include('dash.vehicles.modal')
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Painel de controle
                </li>
                <li class="breadcrumb-item active">Veículos</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <div>
                        <i class="fas fa-table"></i>
                        Tabela de veículos
                    </div>
                    <form action="/search/vehicle" method="POST" style="max-widht:150px;">
                        <div class="input-group mb-3">
                            @csrf
                            <input placeholder="Buscar por..." name="name" type="text" class="form-control" aria-label="Buscar por...">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if(array_key_exists('success', $_GET))
                        @switch($_GET['success'])
                            @case('true')
                                <div class="my-1">
                                    <div class="alert alert-success">Veículo excluído com sucesso!</div>
                                </div>
                                @break
                            @case('2')
                                <div class="my-1">
                                    <div class="alert alert-success">Veículo criado com sucesso!</div>
                                </div>
                                @break
                        @endswitch
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Cor</th>
                                    <th>Ano</th>
                                    <th>Modelo do Equipamento</th>
                                    <th>Cliente</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vehicles as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->placa}}</td>
                                        <td>{{$item->brand}}</td>
                                        <td>{{$item->model}}</td>
                                        <td>{{$item->color}}</td>
                                        <td>{{$item->year}}</td>
                                        <td>
                                            <a href="/veiculo/{{$item->id}}">{{$item->equipment['chip_num']}}</a>
                                        </td>
                                        <td>
                                            <a href="/client/{{$item->owner->id}}">{{$item->owner->name}}</a>
                                        </td>
                                        <td class="dropdown">
                                            <button
                                                id="drop-menu-{{$item->id}}"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                class="btn btn-outline-dark dropdown-toggle"
                                            >
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="drop-menu-{{$item->id}}">
                                                <a class="dropdown-item" href="/veiculo/{{$item->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    Ver Mais
                                                </a>
                                                <a class="dropdown-item text-warning" href="/editar-veiculo/{{$item->id}}">
                                                    <i class="fa fa-edit"></i>
                                                    Editar
                                                </a>
                                                <button onclick="callDelete({{$item->id}})" class="dropdown-item text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                    Deletar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">
                                                <span>Nenhum veículo encontrado</span>
                                            </td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if($vehicles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$vehicles->links()}}
                        @endif
                </div>
                </div>
                <div class="card-footer small text-muted">Ultimo update {{date('d/m/Y')}}</div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © {{config('app.name')}} {{date('Y', time())}}</span>
            </div>
          </div>
        </footer>

      </div>
@endsection
@section('script')
<script>
    var curId;
    function callDelete(id){
        curId = id;
        $('#modal').modal('show');
        console.log(curId)
    }
    $('#modal').on('hidden.bs.modal', function (e) {
        curId = null;
        console.log(curId)
    });
    function deleteVehicle(){
        console.log('called delete for:' + curId);
        window.location.replace('/veiculo/delete/'+curId);
    }
</script>
@endsection
