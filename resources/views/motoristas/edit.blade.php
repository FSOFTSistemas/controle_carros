@extends('adminlte::page')

@section('title', 'Editar Motorista')

@section('content_header')
    <h1>Editar Motorista</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('motoristas.update', $motorista->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $motorista->nome) }}" required
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" class="form-control" value="{{ old('apelido', $motorista->apelido) }}"
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $motorista->cpf) }}" required
                        oninput="mascaraCPF(this)">
                </div>
                <div class="form-group">
                    <label for="curso_1">Curso 1 (PDF)</label>
                    <input type="file" name="curso_1" class="form-control" accept="application/pdf">
                    @if ($motorista->curso_1)
                        <p>Atual: <a href="{{ Storage::url($motorista->curso_1) }}" target="_blank">Ver Curso 1</a></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="curso_2">Curso 2 (PDF)</label>
                    <input type="file" name="curso_2" class="form-control" accept="application/pdf">
                    @if ($motorista->curso_2)
                        <p>Atual: <a href="{{ Storage::url($motorista->curso_2) }}" target="_blank">Ver Curso 2</a></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cnh">CNH (PDF)</label>
                    <input type="file" name="cnh" class="form-control" accept="application/pdf">
                    @if ($motorista->cnh)
                        <p>Atual: <a href="{{ Storage::url($motorista->cnh) }}" target="_blank">Ver CNH</a></p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="data_vencimento_cnh">Data de Vencimento da CNH</label>
                    <input type="date" name="data_vencimento_cnh" class="form-control" value="{{ old('data_vencimento_cnh', $motorista->data_vencimento_cnh) }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Máscara para o campo CPF
        function mascaraCPF(campo) {
            var cpf = campo.value;
            cpf = cpf.replace(/\D/g, '');
             // Remove tudo o que não for número
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            campo.value = cpf;
        }

        // Forçando os campos a ficarem em maiúsculas ao digitar
        document.querySelectorAll('input[type="text"]').forEach(function(input) {
            input.addEventListener('input', function() {
                this.value = this.value.toUpperCase();  // Converte para maiúsculas
            });
        });
    </script>
@stop
