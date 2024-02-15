@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Guru</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="/guru/store" method="post">
            @csrf
            <label for="">NIP</label>
            <input type="number" name="nip" id="">
            <label for="">Nama Guru</label>
            <input type="text" name="nama_guru" id="">
            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L"> Laki-laki
            <input type="radio" name="jk" id="" value="P"> Perempuan
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="10" rows="5"></textarea>
            <label for="">password</label>
            <input type="text" name="password" id="">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

