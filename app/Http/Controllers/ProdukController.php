<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

use function Laravel\Prompts\search;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('MasterData.produk.allProduk', compact('produks'));
    }

    public function byKategori($kategori)
    {
        $kategoris = Kategori::with([
            'produks' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
        ])->findOrFail($kategori);

        confirmDelete('Hapus Data', 'Apakah anda ingin menghapus data ini?');

        return view('MasterData.produk.index', compact('kategoris'));
    }

    public function store(Request $request, Kategori $kategori)
    {
        $request->validate(
            [
                'nama_produk' => 'required|unique:produks,nama_produk ',
                'harga_jual' => 'required|numeric|min:0',
                'harga_beli_pokok' => 'required|numeric|min:0',
                'stock' => 'required|numeric|min:0',
                'stock_min' => 'required|numeric|min:0',
                'is_active' => 'in:0,1',
            ],
            [
                'nama_produk.required' => 'nama produk wajib diisi',
                'nama_produk.unique' => 'nama produk sudah ada',
                'harga_jual' => 'Harga Jual wajib diisi',
                'harga_beli_pokok' => 'Harga beli pokok wajib diisi',
                'stock' => 'Stock wajib diisi',
                'stock_min' => 'Stock minimal wajib diisi',
            ],
        );

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'sku' => Produk::nomorSku(),
            'harga_jual' => $request->harga_jual,
            'harga_beli_pokok' => $request->harga_beli_pokok,
            'stock' => $request->stock,
            'stock_min' => $request->stock_min,
            'is_active' => $request->is_active ?? 0,
            'kategori_id' => $kategori->id,
        ]);
        toast()->success('Data berhasil disimpan');
        return redirect()->route('master-data.produk.byKategori', $kategori->id);
    }

    public function update(Request $request, Produk $produk, Kategori $kategori)
    {
        $validated = $request->validate(
            [
                'nama_produk' => 'required|unique:produks,nama_produk,' . $produk->id,
                'harga_jual' => 'required|numeric|min:0',
                'harga_beli_pokok' => 'required|numeric|min:0',
                'stock' => 'required|numeric|min:0',
                'stock_min' => 'required|numeric|min:0',
                'is_active' => 'in:0,1',
            ],
            [
                'nama_produk.required' => 'nama produk wajib diisi',
                'nama_produk.unique' => 'nama produk sudah ada',
                'harga_jual' => 'Harga Jual wajib diisi',
                'harga_beli_pokok' => 'Harga beli pokok wajib diisi',
                'stock' => 'Stock wajib diisi',
                'stock_min' => 'Stock minimal wajib diisi',
                // 'is_active' => 'Status produk wajib diisi',
            ],
        );

        $produk->nama_produk = $validated['nama_produk'];
        $produk->harga_jual = $validated['harga_jual'];
        $produk->harga_beli_pokok = $validated['harga_beli_pokok'];
        $produk->stock = $validated['stock'];
        $produk->stock_min = $validated['stock_min'];
        // $produk->is_active = $validated['is_active'] ?? 0;
        // $produk->is_active = $validated->boolean('is_active');
        $produk->kategori_id = $kategori->id;
        $produk->is_active = $request->boolean('is_active');

        $produk->save();

        toast()->success('Data Berhasil Diupdate');
        return redirect()->route('master-data.produk.byKategori', $kategori->id);
    }

    public function destroy(Produk $produk, Kategori $kategori)
    {
        $produk->delete();
        toast()->success('Data berhasil dihapus');
        return redirect()->route('master-data.produk.byKategori', $kategori->id);
    }

    public function getdata()
    {
        $search = request()->query('search');

        $query = Produk::query();
        $produk = $query->where('nama_produk', 'like', '%' . $search . '%')->get();

        return response()->json($produk);
    }

    public function cekstok(){
        $id = request()->query('id');
        $stok = Produk::find($id)->stok;

        return response()->json($stok);
    }
}
