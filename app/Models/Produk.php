<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama_produk', 'sku', 'harga_jual', 'harga_beli_pokok', 'stock', 'stock_min', 'is_active', 'kategori_id'];

public static function nomorSku(){
    // SKU-00001
    $prefix = 'SKU-';
    $maxId = self::max('id');
    $sku = $prefix. str_pad($maxId + 1, 5, '0', STR_PAD_LEFT);

    return $sku;
}

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
