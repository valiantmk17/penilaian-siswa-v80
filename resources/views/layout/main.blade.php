<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Penilaian Siswa</title>
</head>
<body>
    @include('partial.header')
    <div class="menu">
        @if (session('role') == 'admin')
            <a href="/home" class="active">HOME</a>
            <a href="/guru/index">Guru</a>
            <a href="/mapel/index">Mapel</a>
            <a href="/kelas/index">Kelas</a>
            <a href="/siswa/index">Siswa</a>
            <a href="/mengajar/index">Mengajar</a>
        @else
            <a href="/nilai/index">Nilai</a>
        @endif
            <a href="/logout">Logout</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
    @include('partial.footer')
</body>
<script src="/js/script.js"></script>
</html>
