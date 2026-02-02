<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesertaDidikController extends Controller
{
    public function index()
    {
        $data = PesertaDidik::all();
        return view('peserta_didik.index', compact('data'));
    }

    public function create()
    {
        return view('peserta_didik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:peserta_didik',
            'nama' => 'required',
            'jk' => 'required'
        ]);

        PesertaDidik::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'qr_token' => Str::uuid()
        ]);

        return redirect()->route('peserta-didik.index')->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = PesertaDidik::findOrFail($id);
        return view('peserta_didik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PesertaDidik::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:peserta_didik,nis,'.$id,
            'nama' => 'required',
            'jk' => 'required'
        ]);

        $data->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk
        ]);

        return redirect()->route('peserta-didik.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PesertaDidik::destroy($id);
        return redirect()->route('peserta-didik.index')->with('success','Data berhasil dihapus');
    }
}
