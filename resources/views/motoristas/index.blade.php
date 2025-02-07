@extends('adminlte::page')

@section('title', 'Lista de Motoristas')

@section('content_header')
    <h1>Lista de Motoristas</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('motoristas.create') }}" class="btn btn-primary">Adicionar Motorista</a>
        </div>
        <div class="card-body">
            <table id="motoristas-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>CPF</th>
                        <th>Curso 1</th>
                        <th>Curso 2</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motoristas as $motorista)
                        <tr>
                            <td>{{ $motorista->id }}</td>
                            <td>{{ $motorista->nome }}</td>
                            <td>{{ $motorista->apelido }}</td>
                            <td>{{ $motorista->cpf }}</td>
                            <td>{{ $motorista->curso_1 }}</td>
                            <td>{{ $motorista->curso_2 }}</td>
                            <td>
                                <a href="{{ route('motoristas.show', $motorista->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#motoristas-table').DataTable();
        });
    </script>
@endsection
@extends('adminlte::page')

@section('title', 'Lista de Motoristas')

@section('content_header')
    <h1>Lista de Motoristas</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('motoristas.create') }}" class="btn btn-primary">Adicionar Motorista</a>
        </div>
        <div class="card-body">
            <table id="motoristas-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>CPF</th>
                        <th>Curso 1</th>
                        <th>Curso 2</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motoristas as $motorista)
                        <tr>
                            <td>{{ $motorista->id }}</td>
                            <td>{{ $motorista->nome }}</td>
                            <td>{{ $motorista->apelido }}</td>
                            <td>{{ $motorista->cpf }}</td>
                            <td>{{ $motorista->curso_1 }}</td>
                            <td>{{ $motorista->curso_2 }}</td>
                            <td>
                                <a href="{{ route('motoristas.show', $motorista->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#motoristas-table').DataTable();
        });
    </script>
@endsection
