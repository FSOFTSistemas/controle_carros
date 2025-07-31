@extends('adminlte::page')

@section('title', isset($secretaria) ? 'Editar Secretaria' : 'Criar Secretaria')

@section('content_header')
    <h5>{{ isset($secretaria) ? 'Editar Secretaria' : 'Criar Secretaria' }}</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('secretarias.index') }}">Voltar</a>
                </div>
            </div>
        </header>
    </section>

    <form class="needs-validation" novalidate
          action="{{ isset($secretaria) ? route('secretarias.update', $secretaria->id) : route('secretarias.store') }}"
          method="POST">
        @csrf
        @if(isset($secretaria))
            @method('PUT')
        @endif
        <div class="mb-3 col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required
                   value="{{ old('nome', $secretaria->nome ?? '') }}" oninput="this.value = this.value.toUpperCase()">
            <div class="invalid-feedback">Informe o nome da secretaria.</div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-outline-success w-25">Salvar</button>
        </div>
    </form>
@stop

@section('adminlte_js')
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