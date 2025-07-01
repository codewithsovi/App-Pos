<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::all();
        return view('MasterData.kategori.index', compact('kategoris'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',
            'deskripsi' => 'required'
        ]);
    }
}
