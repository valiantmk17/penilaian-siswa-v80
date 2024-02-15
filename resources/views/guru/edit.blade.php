@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Mapel</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="">NIP</label>
            <input type="number" name="nip" id="" value="{{ $guru->nip }}">
            <label for="">Nama Guru</label>
            <input type="text" name="nama_guru" id="" value="{{ $guru->nama_guru }}">
            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}> Laki-laki
            <input type="radio" name="jk" id="" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}> Perempuan
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="10" rows="5">{{ $guru->alamat }}</textarea>
            <label for="">password</label>
            <input type="text" name="password" id="" value="{{ $guru->password }}">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

