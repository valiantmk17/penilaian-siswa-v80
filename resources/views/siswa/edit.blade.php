@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Siswa</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <label for="">NIS</label>
            <input type="number" name="nis" id="" value="{{ $siswa->nis }}">
            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="" value="{{ $siswa->nama_siswa }}">
            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }}> Laki-laki
            <input type="radio" name="jk" id="" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }}> Perempuan
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="10" rows="5">{{ $siswa->alamat }}</textarea>
            <label for="">Kelas</label>
            <select name="kelas_id" id="">
                @foreach ($kelas as $k)
                    @if ($siswa->kelas_id == $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                    @else
                        <option value="{{ $k->id }}" >{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                    @endif
                @endforeach
            </select>
            <label for="">password</label>
            <input type="text" name="password" id="" value="{{ $siswa->password }}">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

