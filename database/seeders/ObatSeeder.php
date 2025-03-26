<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_obat' => 'Paracetamol',
                'kemasan' => 'Tablet',
                'harga' => 5000
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'kemasan' => 'Kapsul',
                'harga' => 8000
            ],
            [
                'nama_obat' => 'Ibuprofen',
                'kemasan' => 'Tablet',
                'harga' => 10000
            ],
            [
                'nama_obat' => 'Vitamin C',
                'kemasan' => 'Tablet',
                'harga' => 7000
            ],
            [
                'nama_obat' => 'Ranitidine',
                'kemasan' => 'kapsul',
                'harga' => 6000
            ],
        ];
    foreach($data as $d){
        Obat::create([
            'nama_obat' => $d['nama_obat'],
            'kemasan' => $d['kemasan'],
            'harga' => $d['harga']
        ]);
    }
    }
}
