<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Novo Usuário</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="secretarias" class="form-label">Secretarias</label>
                        <select name="secretarias[]" id="secretarias" class="form-control select2" multiple>
                            @foreach($secretarias ?? [] as $secretaria)
                                <option value="{{ $secretaria->id }}">{{ $secretaria->nome }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Segure Ctrl (Cmd no Mac) para selecionar múltiplas secretarias.</small>
                    </div>
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissões</label>
                        <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ ucfirst($permission->name) }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Segure Ctrl (Cmd no Mac) para selecionar múltiplas permissões.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $('#createUserModal').on('shown.bs.modal', function () {
        $('.select2').select2({
            dropdownParent: $('#createUserModal'),
            width: '100%'
        });
    });
</script>
@endpush
