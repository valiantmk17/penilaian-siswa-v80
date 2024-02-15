@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Nilai</h2>
        
        @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/nilai/store/{{ $idKelas }}" method="post">
            @csrf
            <label for="mengajar_id">Guru Mapel</label>
            <select name="mengajar_id" id="mengajar_id">
                <option></option>
                @foreach ($mengajar as $each)
                    <option value="{{ $each->id }}">{{ $each->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id">
                <option></option>
                @foreach ($siswa as $each)
                    <option value="{{ $each->id }}">{{ $each->nama_siswa }}</option>
                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" min="0" max="100">

            <label for="uts">UTS</label>
            <input type="number" name="uts" id="uts" min="0" max="100">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" min="0" max="100">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>

@endsection
