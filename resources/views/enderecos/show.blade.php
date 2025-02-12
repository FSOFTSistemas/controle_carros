@extends('adminlte::page')

@section('title', 'Detalhes do Endereço')

@section('content_header')
    <h1>Detalhes do Endereço</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <p>{{ strtoupper($endereco->logradouro) }}</p>
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <p>{{ $endereco->numero }}</p>
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <p>{{ strtoupper($endereco->bairro) }}</p>
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <p>{{ $endereco->cep }}</p>
            </div>

            <div class="form-group">
                <label for="uf">UF</label>
                <p>{{ strtoupper($endereco->uf) }}</p>
            </div>

            <div class="d-flex">
                <a href="{{ route('enderecos.index') }}" class="btn btn-secondary w-50">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
                <a href="{{ route('enderecos.edit', $endereco) }}" class="btn btn-warning w-50">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Mascara para o CEP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Máscara para o campo CEP
            $('#cep').mask('00000-000');

            // Fazendo os campos de texto ficarem em maiúsculas ao digitar
            $('#logradouro, #bairro, #uf').on('input', function() {
                this.value = this.value.toUpperCase();
            });
        });
    </script>
@stop
