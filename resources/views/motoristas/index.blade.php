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
                        <th>CNH</th>
                        <th>Vencimento CNH</th>
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
                            <td>
                                @if ($motorista->cnh)
                                    <a href="{{ Storage::url($motorista->cnh) }}" target="_blank" class="btn btn-info btn-sm">Ver CNH</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $motorista->data_vencimento_cnh }}</td>
                            <td>
                                <a href="{{ route('motoristas.documentos', $motorista->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-file-alt"></i> Ver Documentos
                                </a>
                                <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
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
