@extends('layouts.main')
@section('title', 'Pemeriksaan')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Pemeriksaan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pemeriksaan</li>
        </ol>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
    <div class="card-header bg-primary text-white">
    <div class="d-flex justify-content-between align-items-center w-100">
        <h3 class="card-title mb-0">Pasien untuk Diperiksa</h3>
        <div style="width: 250px;">
            <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari pasien...">
        </div>
    </div>
</div>
<div class="card-body" style="max-height: 400px; overflow-y: auto;">
    <table id="tabelPeriksa" class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periksas as $periksa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $periksa->pasien->nama }}</td>
                    <td>
                        @if ($periksa->status === 'Menunggu Pemeriksaan')
                            <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-sm btn-primary">Periksa</a>
                        @elseif ($periksa->status === 'Selesai')
                            <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endif
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

<!-- Include SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
</script>
@endif
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const search = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPeriksa tbody tr');

            rows.forEach(row => {
                const nama = row.cells[1].textContent.toLowerCase();
                row.style.display = nama.includes(search) ? '' : 'none';
            });
        });
    </script>
@endsection
