<?php

namespace App\Http\Controllers;

use App\Models\KonsekuensiTelat;
use Illuminate\Http\Request;

class KonsekuensiTelatController extends Controller
{
    public function index()
    {
        $data = KonsekuensiTelat::all();
        return view('konsekuensi_telat.index', compact('data'));
    }

    public function create()
    {
        return view('konsekuensi_telat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_konsekuensi' => 'required',
            'denda' => 'required|numeric'
        ]);

        KonsekuensiTelat::create($request->all());
        return redirect()->route('konsekuensi-telat.index')->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = KonsekuensiTelat::findOrFail($id);
        return view('konsekuensi_telat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KonsekuensiTelat::findOrFail($id);

        $request->validate([
            'nama_konsekuensi' => 'required',
            'denda' => 'required|numeric'
        ]);

        $data->update($request->all());
        return redirect()->route('konsekuensi-telat.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        KonsekuensiTelat::destroy($id);
        return redirect()->route('konsekuensi-telat.index')->with('success','Data berhasil dihapus');
    }
}
