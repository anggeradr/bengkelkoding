@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="my-4">Daftar Pemeriksaan</h2>

    @if (auth()->user()->role == 'pasien')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajukan Pemeriksaan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('periksa.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="id_dokter">Pilih Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Ajukan Pemeriksaan</button>
            </form>
        </div>
    </div>
    @endif

    <div class="card mt-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pemeriksaan Pasien</h5>
            <div class="ml-auto" style="width: 250px;">
                <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari Pemeriksaan...">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="pemeriksaanTable">
                <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                        <th>Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periksas as $periksa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $periksa->dokter->nama ?? '-' }}</td>
                            <td>{{ $periksa->tanggal_periksa ?? 'N/A' }}</td>
                            <td>{{ $periksa->biaya_periksa != 0 ? 'Rp ' . number_format($periksa->biaya_periksa, 0, ',', '.') : 'N/A' }}</td>
                            <td>
                                @if ($periksa->status == 'Menunggu Pemeriksaan')
                                    <span class="badge badge-warning">{{ $periksa->status }}</span>
                                @elseif ($periksa->status == 'Selesai')
                                    <span class="badge badge-success">{{ $periksa->status }}</span>
                                @else
                                    <span class="badge badge-secondary">{{ $periksa->status ?? 'Belum Diproses' }}</span>
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
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('#pemeriksaanTable tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
</script>
@endsection
