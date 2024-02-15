@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>List Data Kelas</h1>
            <a href="/kelas/create" class="button-primary">Tambah Data Kelas</a>
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
                    <th>Tingkat Kelas</th>
                    <th>Jurusan</th>
                    <th>Rombel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->kelas }}</td>
                        <td>{{ $k->jurusan }}</td>
                        <td>{{ $k->rombel }}</td>
                        <td style="text-align: center">
                            <a href="/kelas/edit/{{ $k->id }}" class="button-warning">EDIT</a>
                            <a href="/kelas/destroy/{{ $k->id }}" onclick="return confirm('YAKIN HAPUS?')" class="button-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           </table>
        </b>
    </center>
@endsection

