<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $produk = Produk::all()->count();
        $users = User::all()->count();
        return view('dashboard.index', compact('produk', 'users'));
    }
}
