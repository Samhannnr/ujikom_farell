<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta Didik</title>
</head>
<body>

<h2>Edit Peserta Didik</h2>

<form action="{{ route('peserta-didik.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    NIS:<br>
    <input type="text" name="nis" value="{{ $data->nis }}"><br><br>

    Nama:<br>
    <input type="text" name="nama" value="{{ $data->nama }}"><br><br>

    Jenis Kelamin:<br>
    <select name="jk">
        <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('peserta-didik.index') }}">Kembali</a>

</body>
</html>
