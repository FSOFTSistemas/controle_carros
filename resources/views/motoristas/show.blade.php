@extends('adminlte::page')

@section('title', 'Detalhes do Motorista')

@section('content_header')
    <h1>Detalhes do Motorista</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('motoristas.index') }}" class="btn btn-primary">Voltar para a lista</a>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{ $motorista->nome }}</li>
                <li><strong>Apelido:</strong> {{ $motorista->apelido }}</li>
                <li><strong>CPF:</strong> {{ $motorista->cpf }}</li>
                <li><strong>Vencimento da CNH:</strong> {{ $motorista->data_vencimento_cnh }}</li>
                
                <!-- Exibindo os links para os documentos -->
                <li><strong>Curso 1:</strong> 
                    @if ($motorista->curso_1)
                        <a href="{{ Storage::url($motorista->curso_1) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
                <li><strong>Curso 2:</strong> 
                    @if ($motorista->curso_2)
                        <a href="{{ Storage::url($motorista->curso_2) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
                <li><strong>CNH:</strong> 
                    @if ($motorista->cnh)
                        <a href="{{ Storage::url($motorista->cnh) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
                <li><strong>Comprovante de Residência:</strong> 
                    @if ($motorista->comprovante_residencia)
                        <a href="{{ Storage::url($motorista->comprovante_residencia) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
                <li><strong>Antecedente Estadual:</strong> 
                    @if ($motorista->antecedente_estadual)
                        <a href="{{ Storage::url($motorista->antecedente_estadual) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
                <li><strong>Antecedente Federal:</strong> 
                    @if ($motorista->antecedente_federal)
                        <a href="{{ Storage::url($motorista->antecedente_federal) }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                    @else
                        -
                    @endif
                </li>
            </ul>
        </div>
    </div>
@endsection
