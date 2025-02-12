@extends('adminlte::page')

@section('title', 'Adicionar Motorista')

@section('content_header')
    <h1>Adicionar Motorista</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('motoristas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" class="form-control" value="{{ old('apelido') }}"
                        oninput="this.value = this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" oninput="mascaraCPF(this)" required
                        value="{{ old('cpf') }}">
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
                    <input type="date" name="data_vencimento_cnh" class="form-control" required>
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
    <script>
        // Função para aplicar a máscara de CPF
        function mascaraCPF(cpf) {
            var v = cpf.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (v.length <= 11) {
                cpf.value = v.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
        }
    </script>
@stop
