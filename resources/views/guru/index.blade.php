@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>List Data GURU</h1>
            <a href="/guru/create" class="button-primary">Tambah Data Guru</a>
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
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>PASSWORD</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $g)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $g->nip }}</td>
                        <td>{{ $g->nama_guru }}</td>
                        <td>{{ $g->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $g->alamat }}</td>
                        <td>{{ $g->password }}</td>
                        <td style="text-align: center">
                            <a href="/guru/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                            <a href="/guru/destroy/{{ $g->id }}" onclick="return confirm('YAKIN HAPUS?')" class="button-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           </table>
        </b>
    </center>
@endsection

