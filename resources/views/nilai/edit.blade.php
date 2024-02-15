@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Nilai</h2>

        @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/nilai/update/{{ $idKelas }}/{{ $nilai->id }}" method="post">
            @csrf
            <label for="mengajar_id">Guru Mapel</label>
            <select name="mengajar_id" id="mengajar_id">
                @foreach ($mengajar as $each)
                    <option value="{{ $each->id }}" @if ($each->id == $nilai->mengajar_id) selected @endif>{{ $each->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id">
                @foreach ($siswa as $each)
                    <option value="{{ $each->id }}" @if ($each->id == $nilai->siswa_id) selected @endif>{{ $each->nama_siswa }}</option>
                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" min="0" max="100" value="{{ $nilai->uh }}">

            <label for="uts">UTS</label>
            <input type="number" name="uts" id="uts" min="0" max="100" value="{{ $nilai->uts }}">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" min="0" max="100" value="{{ $nilai->uas }}">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>

@endsection
