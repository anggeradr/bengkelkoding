@extends('layouts.main')
@section('title', 'Obat')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Obat</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">List Obat</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Obat</h5>
    </div>
    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('obat.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="kemasan">Kemasan</label>
                <input type="text" name="kemasan" id="kemasan" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="harga">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Obat</button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="obatTable">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obats as $index => $obat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->kemasan }}</td>
                            <td>Rp{{ number_format($obat->harga, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    @include('layouts.lib.ext-js-datatables')
    <!-- Page specific script -->
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>

@endsection