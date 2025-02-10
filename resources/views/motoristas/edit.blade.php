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
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $motorista->nome }}" required>
                </div>

                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" name="apelido" id="apelido" class="form-control" value="{{ $motorista->apelido }}">
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $motorista->cpf }}" required>
                </div>

                <div class="form-group">
                    <label for="curso_1">Arquivo 1</label>
                    <input type="file" name="curso_1" id="curso_1" class="form-control">
                    @if($motorista->curso_1)
                        <p>Arquivo atual: <a href="{{ Storage::url($motorista->curso_1) }}" target="_blank" class="btn btn-info btn-sm">Ver Curso 1</a></p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="curso_2">Arquivo 2</label>
                    <input type="file" name="curso_2" id="curso_2" class="form-control">
                    @if($motorista->curso_2)
                        <p>Arquivo atual: <a href="{{ Storage::url($motorista->curso_2) }}" target="_blank" class="btn btn-info btn-sm">Ver Curso 2</a></p>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('motoristas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
