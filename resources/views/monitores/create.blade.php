@extends('adminlte::page')

@section('title', isset($monitor) ? 'Editar Monitor' : 'Criar Monitor')

@section('content_header')
    <h5>{{ isset($monitor) ? 'Editar Monitor' : 'Criar Monitor' }}</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('monitores.index') }}">Voltar</a>
                </div>
            </div>
        </header>
    </section>

    <form class="row needs-validation" novalidate
        action="{{ isset($monitor) ? route('monitores.update', $monitor->id) : route('monitores.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($monitor))
            @method('PUT')
        @endif

        <!-- Nav Tabs -->
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Dados do Monitor</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <span class="input-group-text"><i class="fa fa-cogs" aria-hidden="true"></i></span>
                    <div class="form-floating">
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" required
                            value="{{ old('nome', $monitor->nome ?? '') }}">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="invalid-feedback">Informe um nome.</div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="apelido" id="apelido" placeholder="apelido"
                            required maxlength="50" value="{{ old('apelido', $monitor->apelido ?? '') }}">
                        <label for="apelido">Apelido</label>
                    </div>
                    <div class="invalid-feedback">Informe um apelido válido.</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" required
                            value="{{ old('cpf', $monitor->cpf ?? '') }}" minlength="11" maxlength="14">
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="invalid-feedback">Informe um CPF válido.</div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="telefone" id="telefone" placeholder="telefone"
                            required minlength="8" value="{{ old('telefone', $monitor->telefone ?? '') }}">
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="invalid-feedback">Informe um telefone válido.</div>
                </div>
            </div>
        </div>

        <!-- Dados do Endereço -->
        <div class="row">
            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="logradouro" id="logradouro"
                            placeholder="Logradouro" required value="{{ old('logradouro', $monitor->endereco->logradouro ?? '') }}">
                        <label for="logradouro">Logradouro</label>
                    </div>
                    <div class="invalid-feedback">Informe o logradouro do endereço.</div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="numero" id="numero" placeholder="Número"
                            required value="{{ old('numero', $monitor->endereco->numero ?? '') }}">
                        <label for="numero">Número</label>
                    </div>
                    <div class="invalid-feedback">Informe o número do endereço.</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro"
                            required value="{{ old('bairro', $monitor->endereco->bairro ?? '') }}">
                        <label for="bairro">Bairro</label>
                    </div>
                    <div class="invalid-feedback">Informe o bairro do endereço.</div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP"
                            required value="{{ old('cep', $monitor->endereco->cep ?? '') }}" maxlength="9">
                        <label for="cep">CEP</label>
                    </div>
                    <div class="invalid-feedback">Informe o CEP do endereço.</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-group has-validation mb-2">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="uf" id="uf" placeholder="UF" required
                            value="{{ old('uf', $monitor->endereco->uf ?? '') }}" maxlength="2">
                        <label for="uf">UF</label>
                    </div>
                    <div class="invalid-feedback">Informe a UF do endereço.</div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-outline-success w-25">Salvar</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@stop
