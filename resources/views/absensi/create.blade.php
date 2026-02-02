<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
</head>
<body>

<h2>Tambah Absensi</h2>

<form action="{{ route('absensi.store') }}" method="POST">
    @csrf
    <label>Peserta Didik:</label>
    <select name="peserta_didik_id">
        @foreach($peserta as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal"><br><br>

    <label>Status:</label>
    <select name="status">
        <option value="Hadir">Hadir</option>
        <option value="Tidak Hadir">Tidak Hadir</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
