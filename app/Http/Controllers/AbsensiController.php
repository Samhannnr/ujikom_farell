<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AnggotaRombel;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = Absensi::with('anggotaRombel')->get();
        return view('absensi.index', compact('data'));
    }

    public function create()
    {
        $anggota = AnggotaRombel::all();
        return view('absensi.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_rombel_id' => 'required|exists:anggota_rombel,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,alpa'
        ]);

        Absensi::create($request->all());
        return redirect()->route('absensi.index')->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = Absensi::findOrFail($id);
        $anggota = AnggotaRombel::all();
        return view('absensi.edit', compact('data','anggota'));
    }

    public function update(Request $request, $id)
    {
        $data = Absensi::findOrFail($id);

        $request->validate([
            'anggota_rombel_id' => 'required|exists:anggota_rombel,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,alpa'
        ]);

        $data->update($request->all());
        return redirect()->route('absensi.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success','Data berhasil dihapus');
    }
}
