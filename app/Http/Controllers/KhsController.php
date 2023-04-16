<?php

namespace App\Http\Controllers;
use App\Models\MataKuliah;
use App\Models\Mahasiswa_MataKuliah;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function khs($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        $MataKuliah = MataKuliah::find($Nim);
        return view('mahasiswas.nilai', compact('Mahasiswa', 'MataKuliah'));
    }
}
