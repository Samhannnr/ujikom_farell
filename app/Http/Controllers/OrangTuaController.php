<?php
// app/Http/Controllers/OrangTuaController.php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\User;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    public function index()
    {
        $ortu = OrangTua::with('user')->get();
        return view('orangtua.index', compact('ortu'));
    }

    public function create()
    {
        $users = User::where('role','orang_tua')->get();
        return view('orangtua.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required',
            'kontak' => 'required',
        ]);

        OrangTua::create($request->all());

        return redirect()->route('orangtua.index')->with('success','Orang Tua berhasil dibuat.');
    }

    public function edit($id)
    {
        $ortu = OrangTua::findOrFail($id);
        $users = User::where('role','orang_tua')->get();
        return view('orangtua.edit', compact('ortu','users'));
    }

    public function update(Request $request, $id)
    {
        $ortu = OrangTua::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required',
            'kontak' => 'required',
        ]);

        $ortu->update($request->all());

        return redirect()->route('orangtua.index')->with('success','Orang Tua berhasil diupdate.');
    }

    public function destroy($id)
    {
        OrangTua::destroy($id);
        return redirect()->route('orangtua.index')->with('success','Orang Tua berhasil dihapus.');
    }
}
