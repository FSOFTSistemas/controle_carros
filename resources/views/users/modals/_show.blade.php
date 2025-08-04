<!-- resources/views/users/modals/_show.blade.php -->
<div class="modal fade" id="showUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="showUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showUserModalLabel">Detalhes do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nome:</strong> <span id="userName">{{$user->name}}</span></p>
                <p><strong>Email:</strong> <span id="userEmail"></span>{{$user->email}}</p>
                <p><strong>Secretarias:</strong>
                    @if($user->secretarias->isNotEmpty())
                        <ul class="mb-0">
                            @foreach($user->secretarias as $secretaria)
                                <li>{{ $secretaria->nome }}</li>
                            @endforeach
                        </ul>
                    @else
                        Nenhuma secretaria vinculada.
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
