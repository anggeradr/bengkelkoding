<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periksa;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'dokter') {
            // Hitung total pemeriksaan yang ditangani dokter ini
            $totalPemeriksaan = Periksa::where('id_dokter', $user->id)->count();
            return view('home', compact('totalPemeriksaan'));
        } elseif ($user->role === 'pasien') {
            // Hitung total riwayat pemeriksaan pasien ini
            $totalPeriksaSaya = Periksa::where('id_pasien', $user->id)->count();
            return view('home', compact('totalPeriksaSaya'));
        }

        return view('home');
    }
}
