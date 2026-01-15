<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Produk;



class HomeController extends Controller
{
    public function index()
    {
        $katalog = Produk::where('tipe', 'standard')->get();
        $unggulan = Produk::where('tipe', 'unggulan')->get();
        $totalProduk = Produk::count();
        return view('client.pages.home', compact('katalog', 'unggulan', 'totalProduk'));
    }
}
