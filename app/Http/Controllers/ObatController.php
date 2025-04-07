<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        $obats = Obat::all();
        return view('list-obat', compact('obats'));
    }

    public function create() {
        return view('create-obat');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_obat' => 'required|max:50',
            'kemasan' => 'required|max:35',
            'harga' => 'required|integer',
        ]);

        Obat::create($request->all());

        return redirect('/obat')->with('success', 'Obat berhasil ditambahkan!');
    }
}
