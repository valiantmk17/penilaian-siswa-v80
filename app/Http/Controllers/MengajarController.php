<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Nilai;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mengajar.index', [
            'mengajar' => Mengajar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required'],
        ]);
        $cek = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if($cek){
            return back()->with('error', 'Data Mengajar Sudah ada');
        }else{
            Mengajar::create($data_mengajar);
            return redirect('/mengajar/index')->with('success', 'Berhasil Tambah Data Mengajar');
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
    public function edit(Mengajar $mengajar)
    {
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required'],
        ]);
        if($request->mapel_id !=$mengajar->mapel_id || $request->kelas_id !=$mengajar->kelas_id){
            $cek = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
            if($cek){
                return back()->with('error', 'Data Mengajar sudah ada');
            }
        }
        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success', 'Berhasil Update Data Mengajar');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mengajar $mengajar)
    {
        $nilai = Nilai::where('mengajar_id', $mengajar->id)->first();
        if($nilai){
            return back()->with('error', 'Data ini Masih ada di halaman Nilai');
        }
        $mengajar->delete();
        return back()->with('success', 'Berhasi Hapus Data Mengajar');
    }
}
