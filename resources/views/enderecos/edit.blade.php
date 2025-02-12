@extends('adminlte::page')

@section('title', 'Editar Endereço')

@section('content_header')
    <h1>Editar Endereço</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('enderecos.update', $endereco->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" name="logradouro" id="logradouro" class="form-control" value="{{ $endereco->logradouro }}" required>
                </div>
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" value="{{ $endereco->numero }}" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $endereco->bairro }}" required>
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" value="{{ $endereco->cep }}" required>
                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" name="uf" id="uf" class="form-control" value="{{ $endereco->uf }}" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@stop
