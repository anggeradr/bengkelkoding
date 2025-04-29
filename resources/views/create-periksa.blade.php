<!-- create-periksa.blade.php -->
@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Buat Pemeriksaan</h2>

        <form action="{{ route('periksa.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_dokter">Pilih Dokter</label>
                <select name="id_dokter" id="id_dokter" class="form-control" required>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_periksa">Tanggal Pemeriksaan</label>
                <input type="date" name="tanggal_periksa" id="tanggal_periksa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="biaya_periksa">Biaya Pemeriksaan</label>
                <input type="number" name="biaya_periksa" id="biaya_periksa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
        </form>
    </div>
@endsection
