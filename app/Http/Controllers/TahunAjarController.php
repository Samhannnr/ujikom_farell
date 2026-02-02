<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    public function index()
    {
        $data = TahunAjar::all();
        return view('tahun_ajar.index', compact('data'));
    }

    public function create()
    {
        return view('tahun_ajar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tahun' => 'required|unique:tahun_ajar,nama_tahun',
            'status' => 'required|in:active,nonactive'
        ]);

        TahunAjar::create($request->all());
        return redirect()->route('tahun-ajar.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = TahunAjar::findOrFail($id);
        return view('tahun_ajar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = TahunAjar::findOrFail($id);

        $request->validate([
            'nama_tahun' => 'required|unique:tahun_ajar,nama_tahun,'.$id,
            'status' => 'required|in:active,nonactive'
        ]);

        $data->update($request->all());
        return redirect()->route('tahun-ajar.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        TahunAjar::destroy($id);
        return redirect()->route('tahun-ajar.index')->with('success', 'Data berhasil dihapus');
    }
}
