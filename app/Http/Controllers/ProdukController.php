<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('MasterData.produk.index');
    }

    public function byKategori($kategoriId)
    {
        $kategoris = Kategori::with('produks')->findOrFail($kategoriId);
        return view('MasterData.produk.index', compact('kategoris'));
    }

    public function store(Request $request, $kategoriId)
    {
        $request->validate(
            [
                'nama_produk' => 'required|unique:produks,nama_kategori',
                'sku' => 'required',
                'sku' => 'required',
                'harga_jual' => 'required',
                'harga_beli_pokok' => 'required',
                'stock' => 'required',
                'stock_min' => 'required',
                'is_active' => 'required',
            ],
            [
                
            ],
        );
    }
}
