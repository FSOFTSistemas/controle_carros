@extends('adminlte::page')

@section('title', 'Lista de Monitores')

@section('content_header')
    <h5>Lista de Monitores</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-success" href="{{ route('monitores.create') }}">
                        <i class="fas fa-plus"></i> Adicionar Monitor
                    </a>
                </div>
            </div>
        </header>
    </section>

    <table id="monitorTable" class="table table-striped ">
        <thead class="bg-primary text-white">
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
                        <button class="btn btn-info btn-sm btn-ver" data-nome="{{ $monitor->nome }}"
                            data-apelido="{{ $monitor->apelido }}" data-cpf="{{ $monitor->cpf }}"
                            data-telefone="{{ $monitor->telefone }}"
                            data-logradouro="{{ $monitor->endereco['logradouro'] ?? '' }}"
                            data-numero="{{ $monitor->endereco['numero'] ?? '' }}"
                            data-bairro="{{ $monitor->endereco['bairro'] ?? '' }}"
                            data-cep="{{ $monitor->endereco['cep'] ?? '' }}"
                            data-uf="{{ $monitor->endereco['uf'] ?? '' }}" data-bs-toggle="modal"
                            data-bs-target="#modalMonitor">
                            Ver
                        </button>

                        <a href="{{ route('monitores.edit', $monitor->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('monitores.destroy', $monitor->id) }}" method="POST"
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



    <!-- Modal de Detalhes do Monitor -->
    <div class="modal fade" id="modalMonitor" tabindex="-1" aria-labelledby="modalMonitorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalMonitorLabel">
                        <i class="fas fa-user-circle"></i> Detalhes do Monitor
                    </h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-body p-3" style="max-height: 400px; overflow-y: auto;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fas fa-user"></i> <strong>Nome:</strong> <span
                                        id="modal-nome"></span></li>
                                <li class="list-group-item"><i class="fas fa-id-badge"></i> <strong>Apelido:</strong> <span
                                        id="modal-apelido"></span></li>
                                <li class="list-group-item"><i class="fas fa-id-card"></i> <strong>CPF:</strong> <span
                                        id="modal-cpf"></span></li>
                                <li class="list-group-item"><i class="fas fa-phone"></i> <strong>Telefone:</strong> <span
                                        id="modal-telefone"></span></li>
                                <li class="list-group-item"><i class="fas fa-map-marker-alt"></i>
                                    <strong>Logradouro:</strong> <span id="modal-logradouro"></span></li>
                                <li class="list-group-item"><i class="fas fa-home"></i> <strong>Número:</strong> <span
                                        id="modal-numero"></span></li>
                                <li class="list-group-item"><i class="fas fa-city"></i> <strong>Bairro:</strong> <span
                                        id="modal-bairro"></span></li>
                                <li class="list-group-item"><i class="fas fa-envelope"></i> <strong>CEP:</strong> <span
                                        id="modal-cep"></span></li>
                                <li class="list-group-item"><i class="fas fa-map"></i> <strong>UF:</strong> <span
                                        id="modal-uf"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Fechar
                    </button>
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
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                responsive: true,
                autoWidth: false
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
