
@extends('layouts.dash')
@section('content')
@include('dash.client.modal')
<div id="content-wrapper" class="bg-light">
    <div class="container-fluid">
        @if(array_key_exists('success', $_GET) && $_GET['success'] == 'true')
        <div class="my-2">
            <div class="alert alert-success">
                Cliente editado com sucesso!
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-5 ml-auto mb-5">
                
                <div class="card">
                    <div class="card-header">
                        <label>Cliente - {{$client->name}}</label>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/client/update/{{$client->id}}">
                            @csrf
                            <div>
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input
                                        type="text" 
                                        name="name"
                                        class="form-control"
                                        value="{{$client->name}}"
                                        required
                                    >
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="phone_a">Telefone 1</label>
                                    <input 
                                        type="text"
                                        name="phone_a"
                                        id="phone_a"
                                        class="form-control"
                                        value="{{$client->phone_a}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                 <div class="form-group">
                                    <label for="phone_b">Telefone 2</label>
                                    <input 
                                        type="text"
                                        id="phone_b"
                                        name="phone_b"
                                        class="form-control"
                                        value="{{$client->phone_b}}"
                                        required
                                    />
                                 </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email"
                                        class="form-control"
                                        value="{{$client->email}}"
                                        required>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    @if($client->type == 'f')
                                    <label for="cpf_cnpj">CPF</label>
                                    @else
                                    <label for="cpf_cnpj">CNPJ</label>
                                    @endif
                                    <input 
                                        type="text"
                                        id="cpf_cnpj"
                                        name="cpf_cnpj"
                                        class="form-control"
                                        value="{{$client->cpf_cnpj}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input
                                        type="text"
                                        id="address"
                                        name="address"
                                        class="form-control"
                                        value="{{$client->address}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="fa fa-edit"></i> Editar
                                </button>
                                <button onclick="callDelete({{$client->id}})" type="button" class="btn btn-outline-danger">
                                    <i class="fa fa-user-minus"></i> Deletar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mr-auto mb-5">
                <div class="card">
                    <div class="card-header">
                        <label>Cliente - {{$client->name}}</label>
                    </div>
                    <div class="card-body">
                        @forelse ($vehicles as $item)
                            <p>Placa do veículo: <a href="/veiculo/{{$item->id}}">{{$item->placa}}</a></p>
                        @empty
                            <p></p>
                        @endforelse
                        <a href="/veiculo/add/{{$client->id}}" class="btn btn-outline-success">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
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
@section('script')
<script>
    var curId, type = "{{$client->type}}";
    function callDelete(id){
        curId = id;
        $('#modal').modal('show');
        console.log(curId)
    }
    $('#modal').on('hidden.bs.modal', function (e) {
        curId = null;
        console.log(curId)
    });
    function deleteClient(){
        console.log('called delete for:' + curId);
        window.location.replace('/client/delete/'+curId);
    }
    $('#phone_a').on('keydown', ()=>{
        $('#phone_a').mask('(00) 00000-0000');
    });
    $('#phone_b').on('keydown', ()=>{
        $('#phone_b').mask('(00) 00000-0000');
    });
    $('#cpf_cnpj').on('keydown', ()=>{
        if(type == 'f'){
            $('#cpf_cnpj').mask('000.000.000-00', {reverse: true});
        }else{
            $('#cpf_cnpj').mask('00.000.000/0000-00', {reverse: true});   
        }
    });
</script>
@endsection
