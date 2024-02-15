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
        <a href="/" class="active">HOME</a>
    </div>
    <div class="kiri-atas">
        <fieldset>
            <b>
                <center>
                    <button onclick="tampilkan_login_admin()" class="button-primary">Admin</button>
                    <button onclick="tampilkan_login_guru()" class="button-primary">Guru</button>
                    <button onclick="tampilkan_login_siswa()" class="button-primary">Siswa</button>
                    <hr>
                        Login sesuai posisi anda
                    <hr>
                </center>

                <div class="container-login" id="login_admin" style="display: none">
                    <center>
                        <b>Login Admin</b>
                        <p>{{ session('error') }}</p>
                    </center>
                    <form action="/login_admin" method="post">
                        @csrf
                        <table>
                            <tr>
                                <td width="25%"><strong>Kode Admin</strong></td>
                                <td width="25%"><strong><input type="text" name="kode_admin" id=""></strong></td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Password</strong></td>
                                <td width="25%"><strong><input type="password" name="password" id=""></strong></td>
                            </tr>
                        </table>
                        <button type="submit" class="button-submit">Login</button>
                    </form>
                </div>

                <div class="container-login" id="login_guru" style="display: none">
                    <center>
                        <b>Login Guru</b>
                        <p>{{ session('error') }}</p>
                    </center>
                    <form action="/login_guru" method="post">
                        @csrf
                        <table>
                            <tr>
                                <td width="25%"><strong>NIP</strong></td>
                                <td width="25%"><strong><input type="text" name="nip" id=""></strong></td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Password</strong></td>
                                <td width="25%"><strong><input type="password" name="password" id=""></strong></td>
                            </tr>
                        </table>
                        <button type="submit" class="button-submit">Login</button>
                    </form>
                </div>

                <div class="container-login" id="login_siswa" style="display: none">
                    <center>
                        <b>Login Siswa</b>
                        <p>{{ session('error') }}</p>
                    </center>
                    <form action="/login_siswa" method="post">
                        @csrf
                        <table>
                            <tr>
                                <td width="25%"><strong>NIS</strong></td>
                                <td width="25%"><strong><input type="text" name="nis" id=""></strong></td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Password</strong></td>
                                <td width="25%"><strong><input type="password" name="password" id=""></strong></td>
                            </tr>
                        </table>
                        <button type="submit" class="button-submit">Login</button>
                    </form>
                </div>
            </b>
        </fieldset>
    </div>
    <div class="kanan">
        <center>
            <h1>
                Selamat Datang
                <br>
                Di Web Penilaian SMK Negeri 1 cibinong
            </h1>
        </center>
    </div>
    <div class="kiri-bawah">
       <b>
        <p class="mar" style="text-align: center">Gallery</p>
        <div class="gallery">
            <img src="{{ asset('img/g2.jpg') }}" alt="">
            <div class="deskripsi">SMK BISA {{ date('Y') }}</div>
        </div>
       </b>
    </div>
    @include('partial.footer')
</body>
<script src="/js/script.js"></script>
</html>
