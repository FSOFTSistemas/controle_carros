@extends('adminlte::page')

@section('title', 'Documentos do Motorista')

@section('content_header')
    <h1>Documentos do Motorista: {{ $motorista->nome }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Documentos</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Curso 1</th>
                    <td>
                        @if ($motorista->curso_1)
                            <a href="{{ Storage::url($motorista->curso_1) }}" target="_blank" class="btn btn-info btn-sm">Ver Curso 1</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Curso 2</th>
                    <td>
                        @if ($motorista->curso_2)
                            <a href="{{ Storage::url($motorista->curso_2) }}" target="_blank" class="btn btn-info btn-sm">Ver Curso 2</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Comprovante de Residência</th>
                    <td>
                        @if ($motorista->comprovante_residencia)
                            <a href="{{ Storage::url($motorista->comprovante_residencia) }}" target="_blank" class="btn btn-info btn-sm">Ver Comprovante</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Antecedente Estadual</th>
                    <td>
                        @if ($motorista->antecedente_estadual)
                            <a href="{{ Storage::url($motorista->antecedente_estadual) }}" target="_blank" class="btn btn-info btn-sm">Ver Antecedente Estadual</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Antecedente Federal</th>
                    <td>
                        @if ($motorista->antecedente_federal)
                            <a href="{{ Storage::url($motorista->antecedente_federal) }}" target="_blank" class="btn btn-info btn-sm">Ver Antecedente Federal</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
