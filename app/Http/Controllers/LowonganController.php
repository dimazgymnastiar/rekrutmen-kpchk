<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    // Menampilkan semua data lowongan
    public function index()
    {
        $lowongan = Lowongan::All();
        return view('lowongan.index')->with('lowongan',$lowongan);
    }

    // Menampilkan form untuk menambahkan data lowongan
    public function create()
    {
        $lowongan = Lowongan::all();
        return view('lowongan.create', compact('lowongan'));
    }

    // Menyimpan data lowongan yang baru dibuat
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string',
            'tgl_tutup' => 'required|date',
            'syarat' => 'required|string'
        ]);
        $validatedData['id'] = uuid_create();

        $lowongan = Lowongan::create($validatedData);
        return redirect()->route('lowongan.index')->with('success', "Lowongan $lowongan berhasil ditambahkan");
    }

    // Menampilkan detail data lowongan
    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
 
        return view('lowongan.show', compact('lowongan'));
    }

    // Menampilkan form untuk mengedit data lowongan
    public function edit(lowongan $lowongan)
    {
        return view('lowongan.edit', compact('lowongan'));
    }

    // Memperbarui data lowongan yang telah diedit
    public function update(Request $request, lowongan $lowongan)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string',
            'syarat' => 'required|string',
            'tgl_tutup' => 'required|date'
        ]);

        $lowongan->update($validatedData);
        return redirect()->route('lowongan.index')->with('success','Data Lowongan berhasil diubah ke database');
    }

    // Menghapus data lowongan
    public function destroy(lowongan $lowongan)
    {
        $deletedlowongan = $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', "Data Lowongan berhasil dihapus database");
    }
}
