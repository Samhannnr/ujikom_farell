<?php
// app/Http/Controllers/SiswaController.php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('user')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $users = User::where('role','siswa')->get();
        return view('siswa.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success','Siswa berhasil dibuat.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $users = User::where('role','siswa')->get();
        return view('siswa.edit', compact('siswa','users'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nis' => 'required|unique:siswa,nis,'.$id,
            'nama' => 'required',
            'jk' => 'required|in:L,P',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success','Siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->route('siswa.index')->with('success','Siswa berhasil dihapus.');
    }
}
