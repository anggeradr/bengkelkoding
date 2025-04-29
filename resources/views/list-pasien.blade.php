@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Pemeriksaan Pasien</h2>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
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
                        <a href="{{ route('periksa.show', $periksa->id) }}" class="btn btn-success btn-sm">Periksa</a>
                        <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
