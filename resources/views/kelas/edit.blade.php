@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2>Tambah Data Kelas</h2>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        @if (session('error'))
            <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
        @endif
        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="">Kelas</label>
            <select name="kelas" id="">
                @foreach ($tingkat_kelas as $k)
                   @if ($kelas->kelas == $k)
                        <option value="{{ $k }}" selected>{{ $k }}</option>
                    @else
                    <option value="{{ $k }}">{{ $k }}</option>
                   @endif
                @endforeach
            </select>
            <label for="">Jurusan</label>
            <select name="jurusan" id="">
                @foreach ($jurusan as $j)
                    @if ($kelas->jurusan == $j)
                        <option value="{{ $j }}" selected>{{ $j }}</option>
                    @else
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endif
                @endforeach
            </select>
            <label for="">Rombel</label>
            <input type="number" name="rombel" min="1" max="4" id="" value="{{ $kelas->rombel }}">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

