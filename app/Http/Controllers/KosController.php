<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $dataKos = Kos::all();
        return view('kos.index', compact('dataKos'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kos'     => 'required',
            'alamat'       => 'required',
            'harga'        => 'required|numeric',
            'jumlah_kamar' => 'required|numeric',
        ]);

        Kos::create($request->all());
        return redirect()->route('kos.index')->with('success', 'Data kos berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kos = Kos::findOrFail($id);
        return view('kos.show', compact('kos'));
    }

    public function edit($id)
    {
        $kos = Kos::findOrFail($id);
        return view('kos.edit', compact('kos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kos'     => 'required',
            'alamat'       => 'required',
            'harga'        => 'required|numeric',
            'jumlah_kamar' => 'required|numeric',
        ]);

        $kos = Kos::findOrFail($id);
        $kos->update($request->all());
        return redirect()->route('kos.index')->with('success', 'Data kos berhasil diupdate!');
    }

    public function destroy($id)
    {
        Kos::findOrFail($id)->delete();
        return redirect()->route('kos.index')->with('success', 'Data kos berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $dataKos = Kos::where('nama_kos', 'like', "%$keyword%")
                      ->orWhere('alamat', 'like', "%$keyword%")
                      ->get();
        return view('kos.index', compact('dataKos', 'keyword'));
    }
}