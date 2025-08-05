@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $motorista }}</h3>
                    <p>Motoristas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $veiculo }}</h3>
                    <p>Veículos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $monitor }}</h3>
                    <p>Monitores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Usuários cadastrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <!-- Card Endereços -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $enderecos }}</h3>
                    <p>Endereços</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <br><br>
    <section class="mb-5">
        <h3 class="text-center mb-4">Ações Rápidas</h3>
        <div class="row">
            <!-- Card Veículos -->
            @can('visualizar veículos')
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('veiculos.index') }}" class="card text-dark border-light shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center"><i class="fas fa-car"></i> Veículos</h5>
                        </div>
                    </a>
                </div>
            @endcan

            <!-- Card Motoristas -->
            @can('visualizar motoristas')
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('motoristas.index') }}" class="card text-dark border-light shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="fas fa-user-tie"></i> Motoristas</h5>
                    </div>
                </a>
            </div>
            @endcan

            <!-- Card Monitores -->
            @can('visualizar monitores')
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('monitores.index') }}" class="card text-dark border-light shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="fas fa-users"></i> Monitores</h5>
                    </div>
                </a>
            </div>
            @endcan

            <!-- Card Usuários -->
            @can('visualizar usuários')
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('users.index') }}" class="card text-dark border-light shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="fas fa-users-cog"></i> Usuários</h5>
                    </div>
                </a>
            </div>
            @endcan

            <!-- Card Endereços -->
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('enderecos.index') }}" class="card text-dark border-light shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="fas fa-map-marker-alt"></i> Endereços</h5>
                    </div>
                </a>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
