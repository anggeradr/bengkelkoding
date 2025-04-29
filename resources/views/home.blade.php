@extends('layouts.main')

@section('title', 'Home')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="jumbotron py-4 bg-light">
        <h3>Selamat datang, 
            @if (Auth::user()->role == 'dokter')
                Dr. {{ Auth::user()->nama }}
            @else
                {{ Auth::user()->nama }}
            @endif
        </h3>
        <p class="lead">Selamat datang di sistem informasi pemeriksaan kesehatan.</p>
    </div>

    <div class="row">
        @if (Auth::user()->role == 'dokter')
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4>{{ $totalPemeriksaan ?? 0 }}</h4>
                        <p>Total Pemeriksaan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                    <a href="{{ route('dokter.memeriksa') }}" class="small-box-footer">
                        Lihat Pemeriksaan <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @elseif (Auth::user()->role == 'pasien')
            <div class="col-md-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>{{ $totalPeriksaSaya ?? 0 }}</h4>
                        <p>Riwayat Pemeriksaan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <a href="/periksa" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
