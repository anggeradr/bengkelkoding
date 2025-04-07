@extends('layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid mt-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Obat</h3>
        <a href="/obat" class="btn btn-sm btn-secondary float-right">Kembali</a>
      </div>

      <form action="/obat" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" id="nama_obat" required>
          </div>
          <div class="form-group">
            <label for="kemasan">Kemasan</label>
            <input type="text" name="kemasan" class="form-control" id="kemasan" required>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" required>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection

