<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Interview;
use App\Models\Lowongan;
use App\Models\Riwayat;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        $daftar = Daftar::all()->sortBy('lowongan_id');
        $jumlahPelamar = Daftar::count(); // Menghitung jumlah pelamar dari tabel daftar
        
        return view('daftar.index', compact('daftar', 'lowongan', 'jumlahPelamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lowongan = Lowongan::all();
        return view('daftar.create')->with('lowongan',$lowongan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|file|mimes:jpeg,png,jpg',
            'tglLahir' => 'required|date',
            'lowongan_id' => 'required|exists:lowongans,id',
            'nama' => 'required|string|max:255',
            'jenisKelamin' => 'required|string',
            'pend' => 'required|string',
            'cerita' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $fotoPath = $request->file('foto')->store('fotos', 'public');
        $cvPath = $request->file('cv')->store('cvs', 'public');

        Riwayat::create([
            'user_id' => auth()->id(),
            'lowongan_id' => $request->lowongan_id,
            'nama' => $request->nama,
            'tglLahir' => $request->tglLahir,
            'jenisKelamin' => $request->jenisKelamin,
            'pend' => $request->pend,
            'cerita' => $request->cerita,
            'foto' => $fotoPath,
            'cv' => $cvPath,
        ]);

        return redirect()->route('riwayat.index')->with('success', 'Lamaran berhasil dikirim.');
    }

    public function riwayat()
    {
        $riwayats = Riwayat::where('user_id', auth()->id())->get();
        return view('riwayat.index', compact('riwayats'));
    }

    public function accept($id)
    {
        $daftar = Daftar::findOrFail($id);

        // Pindahkan data pelamar ke tabel interview
        $interviews = Interview::create([
            'foto' => $daftar->foto,
            'lowongan_id' => $daftar->lowongan_id, // Tambahkan ini
            'posisi' => $daftar->lowongan->posisi,
            'nama' => $daftar->nama,
            'jenisKelamin' => $daftar->jenisKelamin,
            'tglLahir' => $daftar->tglLahir,
            'pend' => $daftar->pend,
            'cerita' => $daftar->cerita,
            'cv' => $daftar->cv
            // Tambahkan kolom lain yang diperlukan
        ]);

        $daftar->delete();

        return redirect()->route('daftar.index')->with('success', 'Pelamar berhasil diterima untuk interview.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daftar $daftar)
    {
        $image_path = public_path('image/daftar/' . $daftar->foto);
        $cv_path = public_path('file/cv/' . $daftar->cv);

        // Hapus file foto jika ada
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        // Hapus file cv jika ada
        if (File::exists($cv_path)) {
            File::delete($cv_path);
        }

        // Hapus entri daftar dari database
        $deleteddaftar = $daftar->delete();

        return redirect()->route('daftar.index')->with('success', "Daftar berhasil dihapus dari database");
    }
}
