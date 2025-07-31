

@extends('adminlte::page')

@section('title', 'Secretarias')

@section('content_header')
    <h1>Secretarias</h1>
@stop

@section('content')
    <a href="{{ route('secretarias.create') }}" class="btn btn-primary mb-3">Nova Secretaria</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secretarias as $secretaria)
                <tr>
                    <td>{{ $secretaria->id }}</td>
                    <td>{{ $secretaria->nome }}</td>
                    <td>
                        <a href="{{ route('secretarias.edit', $secretaria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('secretarias.destroy', $secretaria->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop