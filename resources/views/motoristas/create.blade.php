@extends('adminlte::page')

@section('title', 'Adicionar Motorista')

@section('content_header')
    <h1>Adicionar Motorista</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('motoristas.store') }}" method="POST" enctype="multipart/form-data" id="motoristaForm">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $motorista->nome ?? '') }}" required
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" class="form-control" value="{{ old('apelido', $motorista->apelido ?? '') }}"
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" required
                        value="{{ old('cpf', $motorista->cpf ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="curso_1">Curso 1 (PDF)</label>
                    <input type="file" name="curso_1" class="form-control" accept="application/pdf" required>
                </div>
                <div class="form-group">
                    <label for="curso_2">Curso 2 (PDF)</label>
                    <input type="file" name="curso_2" class="form-control" accept="application/pdf" required>
                </div>
                <div class="form-group">
                    <label for="cnh">CNH (PDF)</label>
                    <input type="file" name="cnh" class="form-control" accept="application/pdf" required>
                </div>
                <div class="form-group">
                    <label for="data_vencimento_cnh">Data de Vencimento da CNH</label>
                    <input type="date" name="data_vencimento_cnh" class="form-control" required value="{{ old('data_vencimento_cnh', $motorista->data_vencimento_cnh ?? '') }}" max="2100-12-31">
                </div>
                <div class="form-group">
                    <label for="comprovante_residencia">Comprovante de Residência (PDF)</label>
                    <input type="file" name="comprovante_residencia" class="form-control" accept="application/pdf"
                        required>
                </div>
                <div class="form-group">
                    <label for="antecedente_estadual">Antecedente Estadual (PDF)</label>
                    <input type="file" name="antecedente_estadual" class="form-control" accept="application/pdf"
                        required>
                </div>
                <div class="form-group">
                    <label for="antecedente_federal">Antecedente Federal (PDF)</label>
                    <input type="file" name="antecedente_federal" class="form-control" accept="application/pdf" required>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success w-50">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                    <a href="{{ route('motoristas.index') }}" class="btn btn-secondary w-50">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        // Aplica a máscara ao campo CPF
        $('#cpf').mask('000.000.000-00');

        // Forçando os campos a ficarem em maiúsculas ao digitar
        $('#apelido, #nome').on('input', function() {
            this.value = this.value.toUpperCase();
        });
    });
</script>
@stop
