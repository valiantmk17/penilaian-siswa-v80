@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Mengajar</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        @if (session('error'))
            <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
        @endif
        <form action="/mengajar/store" method="post">
            @csrf

            <label for="">Guru</label>
            <select name="guru_id" id="">
                <option value="" disabled selected>Pilih Guru</option>
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                @endforeach
            </select>

            <label for="">Mapel</label>
            <select name="mapel_id" id="">
                <option value="" disabled selected>Pilih Mapel</option>
                @foreach ($mapel as $m)
                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="">Kelas</label>
            <select name="kelas_id" id="">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }} </option>
                @endforeach
            </select>



            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

