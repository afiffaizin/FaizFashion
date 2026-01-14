<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Produk;



class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('client.pages.home', compact('produk'));
    }
}
