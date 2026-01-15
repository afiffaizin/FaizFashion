<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $totalProduk   = Produk::count();
        $produkUnggulan = Produk::where('tipe', 'unggulan')->count();
        $produkPria    = Produk::where('kategori', 'Pria')->count();
        $produkWanita  = Produk::where('kategori', 'Wanita')->count();
        $query = Produk::query();

        // Search by name or description
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        // Filter by tipe
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->input('tipe'));
        }

        $produk = $query->latest()->paginate(3)->withQueryString();

        return view('admin.pages.dashboard', compact('produk', 'totalProduk', 'produkUnggulan', 'produkPria', 'produkWanita'));
    }

    public function addProduk()
    {
        return view('admin.pages.produk.addProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'kategori'    => 'required',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $namaFile = null; // Default null jika tidak ada gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/produk'), $namaFile);
        }

        $tipeProduk = $request->has('tipe') ? 'unggulan' : 'standard';

        // 4. Simpan ke Database
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'harga'       => $request->harga,
            'tipe'        => $tipeProduk,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $namaFile,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.pages.produk.editProduct', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|min:5',
            'harga'       => 'required|numeric',
            'kategori'    => 'required',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/produk'), $namaFile);
            $produk->gambar = $namaFile;
        }

        $tipeProduk = $request->has('tipe') ? 'unggulan' : 'standard';

        $produk->nama_produk = $request->nama_produk;
        $produk->kategori    = $request->kategori;
        $produk->harga       = $request->harga;
        $produk->tipe        = $tipeProduk;
        $produk->deskripsi   = $request->deskripsi;

        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {

        $produk = Produk::findOrFail($id);


        if ($produk->gambar && file_exists(public_path('uploads/produk/' . $produk->gambar))) {
            unlink(public_path('uploads/produk/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
