<!DOCTYPE html>
<html>
    <head>
        <title>Form Ubah Data User</title>
        <a href="/user">kembali</a>
    </head>
    <body>
        <h1>Form Ubah Data User</h1>
        <form method="post" action="ubah_simpan/{{ $data->user_id }}">

            {{ csrf_field()}}
            {{ method_field('PUT')}}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" value="{{ $data->username }}">
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" value="{{ $data->username }}">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" value="{{ $data->password }}">
            <br>
            <label>Level ID</label>
            <input type="number" name="level_id" value="{{ $data->level_id }}">
            <br>
            <input type="submit" name="btn btn-success" value="Simpan">
        </form>
    </body>
</html>