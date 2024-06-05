<?php

// app/Http/Controllers/DirectorController.php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    // Tambahkan middleware untuk memastikan hanya direktur yang dapat mengakses controller ini
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:director');
    }

    // Tambahkan metode index untuk menampilkan halaman dashboard direktur
    function index()
    {
        $lowongan = Lowongan::All();
        return view('lowongan.index')->with('lowongan',$lowongan);
    }

    // Tambahkan metode lain yang diperlukan oleh direktur
    // Contoh metode untuk menampilkan profil direktur
    public function profile()
    {
        return view('director.profile');
    }
}
