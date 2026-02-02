<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peserta Didik</title>
</head>
<body>

<h2>Tambah Peserta Didik</h2>

<form action="{{ route('peserta-didik.store') }}" method="POST">
    @csrf

    <label>NIS</label><br>
    <input type="text" name="nis"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>Jenis Kelamin</label><br>
    <select name="jk">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>
