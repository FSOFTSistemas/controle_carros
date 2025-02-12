@extends('adminlte::page')

@section('title', 'Criar Usuário')

@section('content_header')
    <h1>Criar Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $user->name ?? '') }}"
                                required
                                style="text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $user->email ?? '') }}" required
                                style="text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control"
                                placeholder="000.000.000-00"
                                value="{{ old('cpf', $user->cpf ?? '') }}"
                                pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                inputmode="numeric"
                                oninput="this.value = this.value.replace(/\D/g, '')
                                               .replace(/^(\d{3})(\d)/, '$1.$2')
                                               .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
                                               .replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4')"
                                maxlength="14"
                                required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>

            </form>
        </div>
    </div>
@stop
