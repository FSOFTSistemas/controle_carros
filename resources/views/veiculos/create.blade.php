@extends('adminlte::page')

@section('title', 'Criar Veículo')

@section('content_header')
    <h5>Criar Veículo</h5>
@stop

@section('content')
    <section class="mb-3">
        <header>
            <div class="row text-right">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('veiculos.index') }}">Voltar</a>
                </div>
            </div>
        </header>
    </section>

    <form class="row needs-validation" novalidate action="{{ route('veiculos.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <!-- Nav Tabs -->
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Dados do Veículo</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fotos-tab" data-bs-toggle="tab" href="#fotos" role="tab"
                        aria-controls="fotos" aria-selected="false">Adicionar Fotos</a>
                </li>
            </ul>

        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Aba de Dados do Veículo -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Aqui você coloca os dados do veículo (formulário de dados do veículo) -->

                <div class="row">
                    <div class="col-6">
                        <div class="input-group has-validation mb-2">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="placa" id="placa" placeholder="Placa"
                                    required minlength="7" maxlength="8" value="{{ old('placa') }}">
                                <label for="placa">Placa</label>
                            </div>
                            <div class="invalid-feedback">Informe uma placa válida.</div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group has-validation mb-2">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="modelo" id="modelo"
                                    placeholder="Modelo" required maxlength="50" value="{{ old('modelo') }}">
                                <label for="modelo">Modelo</label>
                            </div>
                            <div class="invalid-feedback">Informe um modelo válido.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group has-validation mb-2">
                            <div class="form-floating">
                                <input class="form-control" type="number" name="ano" id="ano" placeholder="2025"
                                    required value="{{ old('ano') }}" min="1900" max="{{ date('Y') }}">
                                <label for="ano">Ano</label>
                            </div>
                            <div class="invalid-feedback">Informe um ano válido.</div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group has-validation mb-2">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="cor" id="cor"
                                    placeholder="Branco" required maxlength="30" value="{{ old('cor') }}">
                                <label for="cor">Cor</label>
                            </div>
                            <div class="invalid-feedback">Informe uma cor válida.</div>
                        </div>
                    </div>
                </div>
                @foreach (['crlv', 'tacografo', 'vistoria', 'autorizacao_te', 'certificado_te'] as $doc)
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="input-group has-validation mb-2">
                                <div class="form-floating">
                                    <input class="form-control" type="file" name="{{ $doc }}"
                                        id="{{ $doc }}" required accept="application/pdf">
                                    <label for="{{ $doc }}">{{ ucfirst(str_replace('_', ' ', $doc)) }}</label>
                                    <div class="invalid-feedback">Informe um documento válido (PDF).</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Aba de Fotos -->
            <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
                <!-- Campos de foto -->
                <form>
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <div class="input-group has-validation">
                                    <div class="form-floating">
                                        <input class="form-control" type="file" name="foto{{ $i }}"
                                            id="foto{{ $i }}" accept="image/jpeg, image/png">
                                        <label for="foto{{ $i }}">Foto {{ $i }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </form>
            </div>





            <div class="text-center">
                <button type="submit" class="btn btn-outline-success w-25">Salvar</button>
            </div>
    </form>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">;
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">;
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
