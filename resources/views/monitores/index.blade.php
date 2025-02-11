@extends('adminlte::page')

@section('title', 'Lista de Monitores')

@section('content_header')
    <h5>Lista de Monitores</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('monitores.create') }}">Adicionar Monitor</a>
                </div>
            </div>
        </header>
    </section>

    <div class="card">
        <div class="card-body">
            <table id="monitorTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monitores as $monitor)
                        <tr>
                            <td>{{ $monitor->id }}</td>
                            <td>{{ $monitor->nome }}</td>
                            <td>{{ $monitor->apelido }}</td>
                            <td>{{ $monitor->cpf }}</td>
                            <td>{{ $monitor->telefone }}</td>
                            <td>
                                <!-- Botão que abre o modal -->
                                <button class="btn btn-info btn-sm btn-ver"
                                    data-nome="{{ $monitor->nome }}"
                                    data-apelido="{{ $monitor->apelido }}"
                                    data-cpf="{{ $monitor->cpf }}"
                                    data-telefone="{{ $monitor->telefone }}"
                                    data-logradouro="{{ $monitor->endereco['logradouro'] ?? '' }}"
                                    data-numero="{{ $monitor->endereco['numero'] ?? '' }}"
                                    data-bairro="{{ $monitor->endereco['bairro'] ?? '' }}"
                                    data-cep="{{ $monitor->endereco['cep'] ?? '' }}"
                                    data-uf="{{ $monitor->endereco['uf'] ?? '' }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalMonitor">
                                    Ver
                                </button>

                                <a href="{{ route('monitores.edit', $monitor->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('monitores.destroy', $monitor->id) }}" method="POST" style="display:inline;">
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

    <!-- Modal de Detalhes do Monitor -->
    <div class="modal fade" id="modalMonitor" tabindex="-1" aria-labelledby="modalMonitorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMonitorLabel">Detalhes do Monitor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nome:</strong> <span id="modal-nome"></span></li>
                        <li class="list-group-item"><strong>Apelido:</strong> <span id="modal-apelido"></span></li>
                        <li class="list-group-item"><strong>CPF:</strong> <span id="modal-cpf"></span></li>
                        <li class="list-group-item"><strong>Telefone:</strong> <span id="modal-telefone"></span></li>
                        <li class="list-group-item"><strong>Logradouro:</strong> <span id="modal-logradouro"></span></li>
                        <li class="list-group-item"><strong>Número:</strong> <span id="modal-numero"></span></li>
                        <li class="list-group-item"><strong>Bairro:</strong> <span id="modal-bairro"></span></li>
                        <li class="list-group-item"><strong>CEP:</strong> <span id="modal-cep"></span></li>
                        <li class="list-group-item"><strong>UF:</strong> <span id="modal-uf"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

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
            $('#monitorTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                "responsive": true,
                "autoWidth": false
            });

            // Preencher os dados no modal ao clicar no botão "Ver"
            $('.btn-ver').click(function() {
                $('#modal-nome').text($(this).data('nome'));
                $('#modal-apelido').text($(this).data('apelido'));
                $('#modal-cpf').text($(this).data('cpf'));
                $('#modal-telefone').text($(this).data('telefone'));
                $('#modal-logradouro').text($(this).data('logradouro'));
                $('#modal-numero').text($(this).data('numero'));
                $('#modal-bairro').text($(this).data('bairro'));
                $('#modal-cep').text($(this).data('cep'));
                $('#modal-uf').text($(this).data('uf'));
            });
        });
    </script>
@stop
