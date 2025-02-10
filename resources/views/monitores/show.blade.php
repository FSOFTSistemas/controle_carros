@extends('adminlte::page')

@section('title', 'Visualizar Monitor')

@section('content_header')
    <h5>Detalhes do Monitor</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('monitores.index') }}">Voltar</a>
                    <a class="btn btn-primary" href="{{ route('monitores.edit', $monitor->id) }}">Editar</a>
                </div>
            </div>
        </header>
    </section>

    <div class="card">
        <div class="card-body">
            <h5>Informações do Monitor</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome:</strong> {{ $monitor->nome }}</li>
                <li class="list-group-item"><strong>Apelido:</strong> {{ $monitor->apelido }}</li>
                <li class="list-group-item"><strong>CPF:</strong> {{ $monitor->cpf }}</li>
                <li class="list-group-item"><strong>Telefone:</strong> {{ $monitor->telefone }}</li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Endereço</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Logradouro:</strong> {{ $monitor->endereco->logradouro }}</li>
                <li class="list-group-item"><strong>Número:</strong> {{ $monitor->endereco->numero }}</li>
                <li class="list-group-item"><strong>Bairro:</strong> {{ $monitor->endereco->bairro }}</li>
                <li class="list-group-item"><strong>CEP:</strong> {{ $monitor->endereco->cep }}</li>
                <li class="list-group-item"><strong>UF:</strong> {{ $monitor->endereco->uf }}</li>
            </ul>
        </div>
    </div>
@stop
