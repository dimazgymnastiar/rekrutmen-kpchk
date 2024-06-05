<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lowongan = Lowongan::all();
        return view('lowongan.index')->with('lowongan', $lowongan);
    }

    public function admin()
    {
        $lowongan = Lowongan::all();
        return view('lowongan.index')->with('lowongan', $lowongan);
    }

    public function direktur()
    {
        // Halaman untuk direktur
        $lowongan = Lowongan::all();
        return view('lowongan.index')->with('lowongan', $lowongan);
    }
}
