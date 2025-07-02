<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        confirmDelete('Hapus Data', 'Apakah anda ingin menghapus data ini?');
        return view('MasterData.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategoris,nama_kategori' . $id,
                'deskripsi' => 'required|max:100|min:10',
            ],
            [
                'nama_kategori.required' => 'nama kategori harus diisi',
                'nama_kategori.unique' => 'nama kategori sudah ada',
                'deskripsi.required' => 'deskripsi harus diisi',
                'deskripsi.max' => 'deskripsi maksimal 100 karakter',
                'deskripsi.min' => 'deskripsi minimal 10 karekter',
            ],
        );

        Kategori::updateOrCreate(
            ['id' => $id],
            [
                'nama_kategori' => $request->nama_kategori,
                'slug' => Str::slug($request->nama_kategori),
                'deskripsi' => $request->deskripsi,
            ],
        );

        toast()->success('Data Berhasil Disimpan');
        return redirect()->route('master-data.kategori.index');
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate(
                [
                    'nama_kategori' => ['required', Rule::unique('kategoris', 'nama_kategori')->ignore($id)],
                    'deskripsi' => 'required|max:100|min:10',
                ],
                [
                    'nama_kategori.required' => 'nama kategori harus diisi',
                    'nama_kategori.unique' => 'nama kategori sudah ada',
                    'deskripsi.required' => 'deskripsi harus diisi',
                    'deskripsi.max' => 'deskripsi maksimal 100 karakter',
                    'deskripsi.min' => 'deskripsi minimal 10 karekter',
                ],
            );

            $kategori = Kategori::findOrFail($id);
            $kategori->nama_kategori = $validated['nama_kategori'];
            $kategori->deskripsi = $validated['deskripsi'];

            $kategori->save();

            toast()->success('Data Berhasil Diupdate');
            return redirect()->route('master-data.kategori.index');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        toast()->success('Data Berhasil Dihapus');
        return redirect()->route('master-data.kategori.index');
    }
}
