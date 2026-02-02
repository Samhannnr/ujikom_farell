<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta Didik</title>
</head>
<body>

<h2>Data Peserta Didik</h2>

{{-- Pesan sukses --}}
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('peserta-didik.create') }}">Tambah Peserta Didik</a><br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jk }}</td>
            <td>
                <a href="{{ route('peserta-didik.edit', $item->id) }}">Edit</a> | 

                <form action="{{ route('peserta-didik.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
