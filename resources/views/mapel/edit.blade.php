@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Mapel</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="/mapel/update/{{ $mapel->id }}" method="post">
            @csrf
            <label for="mapel">Mapel</label>
            <input type="text" name="nama_mapel" id="mapel" value="{{ $mapel->nama_mapel }}">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

