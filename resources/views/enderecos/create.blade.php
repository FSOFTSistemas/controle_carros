@extends('adminlte::page')

@section('title', 'Adicionar Endereço')

@section('content_header')
    <h1>Adicionar Endereço</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('enderecos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" name="logradouro" id="logradouro" class="form-control" value="{{ old('logradouro') }}"
                        required oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{ old('bairro') }}"
                        required oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep') }}" required>
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" name="uf" id="uf" class="form-control" value="{{ old('uf') }}"
                        required oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-success w-50">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                    <a href="{{ route('enderecos.index') }}" class="btn btn-secondary w-50">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <!-- Mascara para o CEP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Máscara para o campo CEP
            $('#cep').mask('00000-000');  // Aplica a máscara ao campo CEP

            // Forçando os campos a ficarem em maiúsculas ao digitar
            $('#logradouro, #bairro, #uf').on('input', function() {
                this.value = this.value.toUpperCase();  // Converte para maiúsculas
            });
        });
    </script>
@endsection
