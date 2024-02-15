@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Siswa</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="/siswa/store" method="post">
            @csrf
            <label for="">NIS</label>
            <input type="number" name="nis" id="">
            <label for="">Nama Guru</label>
            <input type="text" name="nama_siswa" id="">
            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L"> Laki-laki
            <input type="radio" name="jk" id="" value="P"> Perempuan
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="10" rows="5"></textarea>
            <label for="">Kelas</label>
            <select name="kelas_id" id="">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>
            <label for="">password</label>
            <input type="text" name="password" id="">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

