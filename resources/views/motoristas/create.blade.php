@extends('adminlte::page')

@section('title', 'Adicionar Motorista')

@section('content_header')
    <h1>Adicionar Motorista</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="motoristaForm" action="{{ route('motoristas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" id="apelido" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" required>
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
                    <input type="file" name="comprovante_residencia" class="form-control" accept="application/pdf" required>
                </div>

                <div class="form-group">
                    <label for="antecedente_estadual">Antecedente Estadual (PDF)</label>
                    <input type="file" name="antecedente_estadual" class="form-control" accept="application/pdf" required>
                </div>

                <div class="form-group">
                    <label for="antecedente_federal">Antecedente Federal (PDF)</label>
                    <input type="file" name="antecedente_federal" class="form-control" accept="application/pdf" required>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Máscara para o campo CPF
            $('#cpf').mask('999.999.999-99');

            // Forçando os campos a ficarem em maiúsculas ao digitar
            $('#apelido, #nome').on('input', function() {
                this.value = this.value.toUpperCase();
            });

            // Automatizando a formatação do CPF antes do envio do formulário
            $('#motoristaForm').on('submit', function() {
                var cpf = $('#cpf').val();
                var cpfFormatted = cpf.replace(/\D/g, ''); // Remove qualquer caractere não numérico
                $('#cpf').val(cpfFormatted);
            });
        });
    </script>
@endsection
