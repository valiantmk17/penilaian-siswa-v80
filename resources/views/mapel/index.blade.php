@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>List Data Mata pelajaran</h1>
            <a href="/mapel/create" class="button-primary">Tambah Data Mapel</a>
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
            @endif
           <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->nama_mapel }}</td>
                        <td style="text-align: center">
                            <a href="/mapel/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                            <a href="/mapel/destroy/{{ $m->id }}" onclick="return confirm('YAKIN HAPUS?')" class="button-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           </table>
        </b>
    </center>
@endsection

