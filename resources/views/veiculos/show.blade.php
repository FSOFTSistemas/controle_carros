@extends('adminlte::page')

@section('title', 'Visualizar Veículo')

@section('content_header')
    <h5>Detalhes do Veículo</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('veiculos.index') }}">Voltar</a>
                    <a class="btn btn-primary" href="{{ route('veiculos.edit', $veiculo->id) }}">Editar</a>
                </div>
            </div>
        </header>
    </section>

    <div class="card">
        <div class="card-body">
            <h5>Informações do Veículo</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Placa:</strong> {{ $veiculo->placa }}</li>
                <li class="list-group-item"><strong>Modelo:</strong> {{ $veiculo->modelo }}</li>
                <li class="list-group-item"><strong>Ano:</strong> {{ $veiculo->ano }}</li>
                <li class="list-group-item"><strong>Cor:</strong> {{ $veiculo->cor }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Documentos</h5>
            <ul class="list-group">
                @foreach (['crlv', 'tacografo', 'vistoria', 'autorizacao_te', 'certificado_te'] as $doc)
                    @if($veiculo->$doc)
                        <li class="list-group-item">
                            <a href="{{ asset('storage/' . $veiculo->$doc) }}" target="_blank">{{ ucfirst(str_replace('_', ' ', $doc)) }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Fotos</h5>
            <div class="row">
                @for ($i = 1; $i <= 6; $i++)
                    @php $foto = 'foto' . $i; @endphp
                    @if($veiculo->$foto)
                        <div class="col-md-4 col-6 mb-2">
                            <img src="{{ asset('storage/'. $veiculo->$foto) }}" alt="Foto {{ $i }}" class="img-fluid rounded">
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
@stop
