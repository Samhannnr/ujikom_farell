<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi</title>
</head>
<body>

<h2>Data Absensi</h2>

<a href="{{ route('absensi.create') }}">Tambah Absensi</a><br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Peserta Didik</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->pesertaDidik->nama ?? 'N/A' }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('absensi.edit', $item->id) }}">Edit</a>
                <form action="{{ route('absensi.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
