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
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" required>
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
                <a href="{{ route('motoristas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
