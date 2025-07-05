<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('MasterData.produk.index', compact('produks'));
    }

    public function byKategori($kategori)
    {
        $kategoris = Kategori::with('produks')->findOrFail($kategori);
        return view('MasterData.produk.index', compact('kategoris'));
    }

    public function store(Request $request, Kategori $kategori)
    {
        $request->validate(
            [
                'nama_produk' => 'required|unique:produks,nama_kategori',
                'harga_jual' => 'required|numeric|min:0',
                'harga_beli_pokok' => 'required|numeric|min:0',
                'stock' => 'required|numeric|min:0',
                'stock_min' => 'required|numeric|min:0',
                'is_active' => 'required',
            ],
            [
                'nama_produk.required' => 'nama produk wajib diisi',
                'nama_produk.unique' => 'nama produk sudah ada',
                // 'sku' => 'SKU wajib diisi',
                'harga_jual' => 'Harga Jual wajib diisi',
                'harga_beli_pokok' => 'Harga beli pokok wajib diisi',
                'stock' => 'Stock wajib diisi',
                'stock_min' => 'Stock minimal wajib diisi',
                'is_active' => 'Status produk wajib diisi',
            ],
        );

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'sku' => Produk::nomorSku(),
            'harga_jual' => $request->harga_jual,
            'harga_beli_pokok' => $request->harga_beli_pokok,
            'stock' => $request->stock,
            'stock_min' => $request->stock_min,
            'is_active' => $request->is_active,
            'kategori_id' => $kategori->id
        ]);
        toast()->success('Data berhasil disimpan');
        return redirect()->route('master-data.produk.byKategori', $kategori->id);
    }

    public function update(){
        
    }

    public function destroy(Produk $produk, Kategori $kategori){
        $produk = Produk::findOrFail($produk);
        $produk->delete();
        toast()->success('Data berhasil dihapus');
        return redirect()->route('master-data.produk.byKategori', $kategori->id);
    }
}
