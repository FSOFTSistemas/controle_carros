@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Gerenciar Usuários</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fas fa-user-plus"></i> Novo Usuário
        </button>
    </div>

    <table id="usersTable" class="table table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <button class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#showUserModal{{ $user->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#editUserModal{{ $user->id }}">
                            <i class="fa fa-pencil">Editar</i>
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">
                            <i class="fas fa-trash"></i> Excluir
                        </button>

                        <!-- Formulário oculto para exclusão -->
                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @include('users.modals._show', ['user' => $user])
                @include('users.modals._edit', ['user' => $user])
            @endforeach
        </tbody>
    </table>

    @include('users.modals._create')
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                responsive: true,
                autoWidth: false
            });
        });

        function confirmDelete(userId) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Essa ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@stop
