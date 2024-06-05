<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Interview;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function index()
    {
        $interviews = Interview::all(); // Pastikan data diambil dengan benar
        $jumlahPelamar1 = Interview::count();
        return view('interviews.index', compact('interviews', 'jumlahPelamar1'));
    }

    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();

        return redirect()->route('interviews.index')->with('success', 'Pelamar berhasil dihapus.');
    }
}