<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $totalKategori = Kategori::count();

        $totalStok = Barang::sum('stok');

        $barangTerbaru = Barang::latest()
            ->take(5)
            ->get();


        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'barangTerbaru',
            'totalStok'
        ));
    }
}
