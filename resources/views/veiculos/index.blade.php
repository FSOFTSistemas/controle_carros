@extends('adminlte::page')

@section('title', 'Lista de Veículos')

@section('content_header')
    <h5>Lista de Veículos</h5>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('veiculos.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Adicionar veículo
        </a>
    </div>

    <table id="veiculosTable" class="table table-striped table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($veiculos as $veiculo)
                <tr>
                    <td>{{ $veiculo->id }}</td>
                    <td>{{ $veiculo->placa }}</td>
                    <td>{{ $veiculo->modelo }}</td>
                    <td>{{ $veiculo->ano }}</td>
                    <td>{{ $veiculo->cor }}</td>
                    <td>
                        <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline;">
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

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#veiculosTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            },
            responsive: true,
            autoWidth: false
        });
        });

       
    </script>
@stop
