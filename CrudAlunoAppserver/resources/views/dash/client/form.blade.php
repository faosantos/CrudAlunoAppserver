@extends('layouts.dash')
@section('content')
    <div id="content-wrapper" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="card ml-auto mr-auto mb-3">
                    <div class="card-header"> Adicionar Cliente </div>
                    <div class="card-body">
                        <form method="POST" action="/client/add">
                            @csrf
                            @include('dash.includes.clientform')
                            <button class="btn btn-outline-success btn-block" type="submit"> Salvar </button>
                        </form>
                    </div>
                    <div class="card-footer">

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
        var type = 'f';
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
        function change(e){
            type = e.value == 'Jurídica' ? 'j' : 'f';
            if(type == 'j'){
                $('#place').html('CNPJ');
                $('#cpf_cnpj').attr('placeholder', '00.000.000./0001-00');
            }else{
                $('#place').html('CPF');
                $('#cpf_cnpj').attr('placeholder', '000.000.000-00');
            }
        }
    </script>
@endsection