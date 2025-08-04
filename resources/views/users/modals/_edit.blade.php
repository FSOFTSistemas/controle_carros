<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{$user->id}}">Editar Usuário</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm{{$user->id}}" action="{{ route('users.update',$user->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name{{$user->id}}" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name{{$user->id}}" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{$user->id}}" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email{{$user->id}}" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password{{$user->id}}" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="password{{$user->id}}" placeholder="Deixe em branco para manter a senha atual">
                    </div>
                    <div class="mb-3">
                        <label for="secretarias{{$user->id}}" class="form-label">Secretarias</label>
                        <select name="secretarias[]" id="secretarias{{$user->id}}" class="form-control select2" multiple="multiple" style="width: 100%;">
                            @foreach($secretarias ?? [] as $secretaria)
                                <option value="{{ $secretaria->id }}" 
                                    {{ $user->secretarias->contains($secretaria->id) ? 'selected' : '' }}>
                                    {{ $secretaria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="permissions{{$user->id}}" class="form-label">Permissões</label>
                        <select name="permissions[]" id="permissions{{$user->id}}" class="form-control select2" multiple="multiple" style="width: 100%;">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}" 
                                    {{ $user->hasPermissionTo($permission->name) ? 'selected' : '' }}>
                                    {{ ucfirst($permission->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $('#editUserModal{{$user->id}}').on('shown.bs.modal', function () {
        $('#secretarias{{$user->id}}, #permissions{{$user->id}}').select2({
            dropdownParent: $('#editUserModal{{$user->id}}'),
            width: '100%'
        });
    });
</script>
@endpush
