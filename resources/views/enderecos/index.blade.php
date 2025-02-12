@extends('adminlte::page')

@section('title', 'Endereços')

@section('content_header')
    <h1>Lista de Endereços</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Mensagem de sucesso -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabela de endereços -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Logradouro</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>UF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enderecos as $endereco)
                        <tr>
                            <td>{{ $endereco->logradouro }}</td>
                            <td>{{ $endereco->numero }}</td>
                            <td>{{ $endereco->bairro }}</td>
                            <td>{{ $endereco->cep }}</td>
                            <td>{{ $endereco->uf }}</td>
                            <td>
                                <a href="{{ route('enderecos.show', $endereco) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('enderecos.edit', $endereco) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('enderecos.destroy', $endereco) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Botão de adicionar novo endereço -->
            <a href="{{ route('enderecos.create') }}" class="btn btn-primary">Adicionar Novo Endereço</a>
        </div>
    </div>
@stop
