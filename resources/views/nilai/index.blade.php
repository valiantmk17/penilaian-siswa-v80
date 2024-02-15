@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>List Data Nilai</h1>
            @if (session('role') == 'guru')
                <a href="/nilai/create/{{ $idKelas }}" class="button-primary"> Tambah Data</a>
            @endif
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
            @endif
           <table class="table-data">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>GURU</th>
                    <th>MAPEL</th>
                    <th>NAMA SISWA</th>
                    <th>UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
                    @if (session('role')== 'guru')
                        <th>ACTION</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $each)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $each->mengajar->guru->nama_guru }}</td>
                        <td>{{ $each->mengajar->mapel->nama_mapel }}</td>
                        <td>{{ $each->siswa->nama_siswa }}</td>
                        <td>{{ $each->uh }}</td>
                        <td>{{ $each->uts }}</td>
                        <td>{{ $each->uas }}</td>
                        <td>{{ $each->na }}</td>
                        @if (session('role')== 'guru')
                            <td>
                                <a href="/nilai/edit/{{ $idKelas }}/{{ $each->id }}" class="button-warning">EDIT</a>
                                <a href="/nilai/destroy/{{ $each->id }}" onclick="return confirm('Yakin Hapus?')" class="button-danger">HAPUS</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
           </table>
        </b>
    </center>
@endsection

