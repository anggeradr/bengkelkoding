<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'pasien') {
            $periksas = Periksa::where('id_pasien', auth()->id())->get();
        } elseif (auth()->user()->role == 'dokter') {
            $periksas = Periksa::where('id_dokter', auth()->id())->get();
        } else {
            $periksas = collect(); // kosong
        }

        $dokters = User::where('role', 'dokter')->get();

        return view('list-periksa', compact('periksas', 'dokters'));
    }

    public function create()
    {
        if (auth()->user()->role == 'pasien') {
            $dokters = User::where('role', 'dokter')->get();
            return view('periksa.create', compact('dokters'));
        }
        return redirect()->route('periksa.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
        ]);

        Periksa::create([
            'id_pasien' => auth()->id(),
            'id_dokter' => $request->id_dokter,
            'catatan' => '',
            'status' => 'Menunggu Pemeriksaan',
        ]);

        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan berhasil diajukan!');

    }

    public function daftarPeriksa()
    {
        $periksas = Periksa::where('id_dokter', auth()->id())->with('pasien')->get();
        return view('dokter-memeriksa', compact('periksas'));
    }

    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all(); // Ambil semua obat

        return view('dokter.periksa', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
{
    $periksa = Periksa::findOrFail($id);

    $request->validate([
        'tanggal_periksa' => 'required|date',
        'catatan' => 'nullable|string',
        'obat_terpilih' => 'nullable|string', // format: 1,2,3
    ]);

    // Kalau ada obat terpilih
    $obatIds = $request->obat_terpilih ? explode(',', $request->obat_terpilih) : [];

    // Ambil obat dan hitung total harga
    $obats = Obat::whereIn('id', $obatIds)->get();
    $totalHarga = $obats->sum('harga');

    // Update periksa
    $periksa->update([
        'tanggal_periksa' => $request->tanggal_periksa,
        'catatan' => $request->catatan,
        'biaya_periksa' => $totalHarga,
        'status' => 'Selesai'
    ]);

    // Redirect ke halaman daftar pemeriksaan dokter
    return redirect()->route('dokter.daftarPeriksa')->with('success', 'Pasien berhasil diperiksa!');
}

    


}
