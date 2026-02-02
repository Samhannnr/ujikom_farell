<?php

namespace App\Http\Controllers;

use App\Models\AnggotaRombel;
use App\Models\PesertaDidik;
use App\Models\RombonganBelajar;
use Illuminate\Http\Request;

class AnggotaRombelController extends Controller
{
    public function index()
    {
        $data = AnggotaRombel::with(['pesertaDidik','rombonganBelajar'])->get();
        return view('anggota_rombel.index', compact('data'));
    }

    public function create()
    {
        $peserta = PesertaDidik::all();
        $rombel = RombonganBelajar::all();
        return view('anggota_rombel.create', compact('peserta', 'rombel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_didik_id' => 'required|exists:peserta_didik,id',
            'rombongan_belajar_id' => 'required|exists:rombongan_belajar,id'
        ]);

        AnggotaRombel::create($request->all());
        return redirect()->route('anggota-rombel.index')->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = AnggotaRombel::findOrFail($id);
        $peserta = PesertaDidik::all();
        $rombel = RombonganBelajar::all();
        return view('anggota_rombel.edit', compact('data','peserta','rombel'));
    }

    public function update(Request $request, $id)
    {
        $data = AnggotaRombel::findOrFail($id);

        $request->validate([
            'peserta_didik_id' => 'required|exists:peserta_didik,id',
            'rombongan_belajar_id' => 'required|exists:rombongan_belajar,id'
        ]);

        $data->update($request->all());
        return redirect()->route('anggota-rombel.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        AnggotaRombel::destroy($id);
        return redirect()->route('anggota-rombel.index')->with('success','Data berhasil dihapus');
    }
}
