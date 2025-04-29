@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h3 class="card-title mb-0">Form Pemeriksaan Pasien</h3>
                <div style="width: 250px;">
                    <input type="text" class="form-control form-control-sm" placeholder="Cari data di form..." disabled>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('periksa.update', $periksa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" id="nama_pasien" class="form-control" value="{{ $periksa->pasien->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                    <input type="date" id="tanggal_periksa" name="tanggal_periksa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea id="catatan" name="catatan" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="obat">Pilih Obat</label>
                    <select id="obat" class="form-control">
                        <option value="">-- Pilih Obat --</option>
                        @foreach($obats as $obat)
                            <option 
                                value="{{ $obat->id }}" 
                                data-nama="{{ $obat->nama_obat }}" 
                                data-harga="{{ $obat->harga }}">
                                {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Obat Dipilih:</label>
                    <ul id="listObat" class="list-group">
                        <!-- Obat yang dipilih akan muncul di sini -->
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="text" id="total_harga" class="form-control" value="Rp0" readonly>
                </div>

                <!-- Input hidden untuk dikirim ke backend -->
                <input type="hidden" name="obat_terpilih" id="obat_terpilih">

                <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
            </form>
        </div>
    </div>
</div>

<script>
    let totalHarga = 0;
    let obatDipilih = [];

    document.getElementById('obat').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const id = selected.value;
        const nama = selected.getAttribute('data-nama');
        const harga = parseInt(selected.getAttribute('data-harga'));

        if (!id || obatDipilih.includes(id)) return;

        obatDipilih.push(id);

        const ul = document.getElementById('listObat');
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.setAttribute('data-id', id);
        li.innerHTML = `
            ${nama} - Rp${harga.toLocaleString('id-ID')}
            <button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${id}" data-harga="${harga}">❌</button>
        `;
        ul.appendChild(li);

        totalHarga += harga;
        document.getElementById('total_harga').value = 'Rp' + totalHarga.toLocaleString('id-ID');
        document.getElementById('obat_terpilih').value = obatDipilih.join(',');
    });

    document.getElementById('listObat').addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-remove')) {
            const id = e.target.getAttribute('data-id');
            const harga = parseInt(e.target.getAttribute('data-harga'));
            obatDipilih = obatDipilih.filter(item => item !== id);
            totalHarga -= harga;
            document.getElementById('total_harga').value = 'Rp' + totalHarga.toLocaleString('id-ID');
            document.getElementById('obat_terpilih').value = obatDipilih.join(',');
            e.target.closest('li').remove();
        }
    });
</script>
@endsection
