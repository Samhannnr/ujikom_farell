<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
</head>
<body>

<h2>Edit Absensi</h2>

<form action="{{ route('absensi.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Peserta Didik:</label>
    <select name="peserta_didik_id">
        @foreach($peserta as $p)
            <option value="{{ $p->id }}" {{ $data->peserta_didik_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
        @endforeach
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="{{ $data->tanggal }}"><br><br>

    <label>Status:</label>
    <select name="status">
        <option value="Hadir" {{ $data->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
        <option value="Tidak Hadir" {{ $data->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
