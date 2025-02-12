@extends('adminlte::page')

@section('title', 'Lista de Motoristas')

@section('content_header')
    <h1>Lista de Motoristas</h1>
@endsection

@section('content')


    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('motoristas.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Adicionar Motorista
        </a>
    </div>

    <table id="motoristas-table" class="table table-striped">
        <thead class="bg-primary text-white">
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
                            <a href="{{ Storage::url($motorista->cnh) }}" target="_blank" class="btn btn-info btn-sm">Ver
                                CNH</a>
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
                        <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#motoristas-table').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@endsection
