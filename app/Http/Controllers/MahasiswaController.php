<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::paginate(5); // Mengambil 5 isi tabel
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        return view('mahasiswas.index', compact('mahasiswas'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public function store(Request $request)
    {
        // Melakukan Validasi Data
            $request->validate([
                'Nim' => 'required',
                'Nama' => 'required',
                'kelas' => 'required',
                'Jurusan' => 'required',
                'No_Handphone' => 'required',
                'Email' => 'required',
                'Tanggal_lahir' => 'required',
            ]);

        // Fungsi eloquent untuk menambah data
            $mahasiswa = new Mahasiswa;
            $mahasiswa->Nim=$request->get('Nim');
            $mahasiswa->Nama=$request->get('Nama');
            $mahasiswa->Jurusan=$request->get('Jurusan');
            $mahasiswa->No_Handphone=$request->get('No_Handphone');
            $mahasiswa->Email=$request->get('Email');
            $mahasiswa->Tanggal_lahir=$request->get('Tanggal_lahir');

        // Fungsi eloquent untuk mmenambah data dengan relasi belongs to
            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }
    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(Request $request, $Nim)
    {
        // Melakukan Validasi Data
            $request->validate([
                'Nim' => 'required',
                'Nama' => 'required',
                'kelas' => 'required',
                'Jurusan' => 'required',
                'No_Handphone' => 'required',
                'Email' => 'required',
                'Tanggal_lahir' => 'required',
            ]);
        
        //fungsi eloquent untuk mengupdate data inputan kita
            $mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
            $mahasiswa->Nim=$request->get('Nim');
            $mahasiswa->Nama=$request->get('Nama');
            $mahasiswa->Jurusan=$request->get('Jurusan');
            $mahasiswa->No_Handphone=$request->get('No_Handphone');
            $mahasiswa->Email=$request->get('Email');
            $mahasiswa->Tanggal_lahir=$request->get('Tanggal_lahir');

            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

        // Fungsi eloquent untuk mengedit data dengan relasi belongs to
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswas = Mahasiswa::where('Nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
