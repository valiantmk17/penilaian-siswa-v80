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
        <form action="/kelas/store" method="post">
            @csrf
            <label for="">Kelas</label>
            <select name="kelas" id="">
                <option value="" disabled selected>Pilih Tingkat Kelas</option>
                @foreach ($tingkat_kelas as $k)
                    <option value="{{ $k }}">{{ $k }}</option>
                @endforeach
            </select>
            <label for="">Jurusan</label>
            <select name="jurusan" id="">
                <option value="" disabled selected>Pilih Jurusan</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>
            <label for="">Rombel</label>
            <input type="number" name="rombel" min="1" max="4" id="">
            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

