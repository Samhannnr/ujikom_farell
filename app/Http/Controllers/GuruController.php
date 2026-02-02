<?php

// app/Http/Controllers/GuruController.php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->get();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        $users = User::where('role','guru')->get();
        return view('guru.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required',
            'nip' => 'required|unique:guru',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success','Guru berhasil dibuat.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $users = User::where('role','guru')->get();
        return view('guru.edit', compact('guru','users'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required',
            'nip' => 'required|unique:guru,nip,'.$id,
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success','Guru berhasil diupdate.');
    }

    public function destroy($id)
    {
        Guru::destroy($id);
        return redirect()->route('guru.index')->with('success','Guru berhasil dihapus.');
    }
}
