@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>edit Data Mengajar</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        @if (session('error'))
            <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
        @endif
        <form action="/mengajar/update/{{ $mengajar->id }}" method="post">
            @csrf

            <label for="">Guru</label>
            <select name="guru_id" id="">
                @foreach ($guru as $g)
                   @if ($mengajar->guru_id == $g->id)
                    <option value="{{ $g->id }}" selected>{{ $g->nama_guru }}</option>
                    @else
                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                   @endif
                @endforeach
            </select>

            <label for="">Mapel</label>
            <select name="mapel_id" id="">
                @foreach ($mapel as $m)
                    @if ($mengajar->mapel_id == $m->id)
                        <option value="{{ $m->id }}" selected>{{ $m->nama_mapel }}</option>
                    @else
                        <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                    @endif
                @endforeach
            </select>

            <label for="">Kelas</label>
            <select name="kelas_id" id="">
                @foreach ($kelas as $k)
                    @if ($mengajar->kelas_id == $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }} </option>
                    @else
                        <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }} </option>
                    @endif
                @endforeach
            </select>



            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

