@extends('layouts.main')

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection

@extends('layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid mt-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Obat</h3>
        <a href="/obat/create" class="btn btn-sm btn-primary float-right">+ Tambah Obat</a>
      </div>

      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Obat</th>
              <th>Kemasan</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            @foreach($obats as $index => $obat)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
