<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tingkat_kelas = ['10', '11', '12','13'];
        $jurusan = ['DKV','BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TOI', 'TKR', 'TFLM'];
        return view('kelas.create', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required'],
        ]);
        $kelas = Kelas::firstOrNew($data_kelas);
        if($kelas -> exists){
            return back()->with('error', 'data kelas sudah ada');
        }else{
            $kelas->save();
            return redirect('/kelas/index')->with('success', 'berhasil Tambah data Kelas');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $tingkat_kelas = ['10', '11', '12','13'];
        $jurusan = ['DKV','BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TOI', 'TKR', 'TFLM'];
        return view('kelas.edit', [
            'kelas' => $kelas,
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required'],
        ]);
        if($request->kelas !=$kelas->kelas || $request->jurusan !=$kelas->jurusan || $request->rombel !=$kelas->rombel){
            $cek_kelas = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->first();
            if($cek_kelas){
                return back()->with('error', 'Data Kelas Sudah ada');
            }
        }
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'berhasil Update data Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $nama_kelas = "$kelas->kelas $kelas->jurusan $kelas->rombel";
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        if($mengajar){
            return back()->with('error', "$nama_kelas masih digunakan di halaman Mengajar");
        }
        if($siswa){
            return back()->with('error', "$nama_kelas masih digunakan di halaman Mengajar");
        }
        $kelas->delete();
        return back()->with('success', 'Berhasil Hapus data Kelas');
    }
}
