<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'Nim' => 2141720077,
                'Nama' => 'Ahmad Bima Tristan',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082138192834',
                'Email' => '2141720077@student.polinema.ac.id',
                'Tanggal_lahir' => '27 Juli 2003'
            ],
            [
                'Nim' => 2141720238,
                'Nama' => 'Andhika Ainur Wibowo',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082918736461',
                'Email' => '2141720038@student.polinema.ac.id',
                'Tanggal_lahir' => '16 Maret 2003'
            ],
            [
                'Nim' => 2141720074,
                'Nama' => 'Elang Putra Adam',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082917365178',
                'Email' => '2141720074@student.polinema.ac.id',
                'Tanggal_lahir' => '20 Juni 2003'
            ],
            [
                'Nim' => 2141720218,
                'Nama' => 'Hakan Alif Pramudya',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '0813874641234',
                'Email' => '2141720218@student.polinema.ac.id',
                'Tanggal_lahir' => '18 Maret 2003'
            ],
            [
                'Nim' => 2141720057,
                'Nama' => 'Naresh Pratista',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '08273648192',
                'Email' => '2141720057@student.polinema.ac.id',
                'Tanggal_lahir' => '02 Agustus 2003'
            ],
            [
                'Nim' => 2141720007,
                'Nama' => 'Wildan Hafidz Mauludin',
                'Kelas' => 'TI - 2F',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '082917365178',
                'Email' => '2141720007@student.polinema.ac.id',
                'Tanggal_lahir' => '06 April 2001'
            ],
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
