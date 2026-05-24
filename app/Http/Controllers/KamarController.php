<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index($kos_id)
    {
        $kos = Kos::findOrFail($kos_id);
        $kamar = $kos->kamar()->get();
        return view('kamar.index', compact('kos', 'kamar'));
    }

    public function create($kos_id)
    {
        $kos = Kos::findOrFail($kos_id);
        return view('kamar.create', compact('kos'));
    }

    public function store(Request $request, $kos_id)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'status'      => 'required',
            'luas'        => 'nullable|numeric',
        ]);

        Kamar::create([
            'kos_id'      => $kos_id,
            'nomor_kamar' => $request->nomor_kamar,
            'status'      => $request->status,
            'luas'        => $request->luas,
        ]);

        return redirect()->route('kamar.index', $kos_id)->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit($kos_id, $id)
    {
        $kos = Kos::findOrFail($kos_id);
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kos', 'kamar'));
    }

    public function update(Request $request, $kos_id, $id)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'status'      => 'required',
            'luas'        => 'nullable|numeric',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamar.index', $kos_id)->with('success', 'Kamar berhasil diupdate!');
    }

    public function destroy($kos_id, $id)
    {
        Kamar::findOrFail($id)->delete();
        return redirect()->route('kamar.index', $kos_id)->with('success', 'Kamar berhasil dihapus!');
    }
}