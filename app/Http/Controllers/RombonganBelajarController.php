<?php

namespace App\Http\Controllers;

use App\Models\RombonganBelajar;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class RombonganBelajarController extends Controller
{
    public function index()
    {
        $data = RombonganBelajar::with('tahunAjar')->get();
        return view('rombongan_belajar.index', compact('data'));
    }

    public function create()
    {
        $tahunAjar = TahunAjar::all();
        return view('rombongan_belajar.create', compact('tahunAjar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rombel' => 'required',
            'tahun_ajar_id' => 'required|exists:tahun_ajar,id'
        ]);

        RombonganBelajar::create($request->all());
        return redirect()->route('rombongan-belajar.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = RombonganBelajar::findOrFail($id);
        $tahunAjar = TahunAjar::all();
        return view('rombongan_belajar.edit', compact('data', 'tahunAjar'));
    }

    public function update(Request $request, $id)
    {
        $data = RombonganBelajar::findOrFail($id);

        $request->validate([
            'nama_rombel' => 'required',
            'tahun_ajar_id' => 'required|exists:tahun_ajar,id'
        ]);

        $data->update($request->all());
        return redirect()->route('rombongan-belajar.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        RombonganBelajar::destroy($id);
        return redirect()->route('rombongan-belajar.index')->with('success', 'Data berhasil dihapus');
    }
}
