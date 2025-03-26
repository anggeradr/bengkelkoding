<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Angger',
                'alamat' => 'pml',
                'no_hp' => "0897654345",
                'role' => 'dokter',
                'email' => 'angger@gmail.com',
                'password' => 'password'
            ],

            
            [
                'nama' => 'Fabio',
                'alamat' => 'tgl',
                'no_hp' => "08974554345",
                'role' => 'dokter',
                'email' => 'fabio@gmail.com',
                'password' => 'password'
            ],

            
            [
                'nama' => 'ger',
                'alamat' => 'pml',
                'no_hp' => "089733654345",
                'role' => 'pasien',
                'email' => 'ger@gmail.com',
                'password' => 'password'
            ],

            
            [
                'nama' => 'Angger',
                'alamat' => 'pml',
                'no_hp' => "089763454345",
                'role' => 'pasien',
                'email' => 'ayam@gmail.com',
                'password' => 'password'
            ]
            ];
            foreach($data as $d){
                User::create([
                    'nama' => $d['nama'],
                    'email' => $d['email'],
                    'password' => $d['password'],
                    'alamat' => $d['alamat'],
                    'no_hp' => $d['no_hp'],
                    'role' => $d['role'],

                ]);
            }
    }
}
