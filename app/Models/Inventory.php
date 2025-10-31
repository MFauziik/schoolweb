<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
     protected $fillable = ['kode_barang', 'nama_barang', 'categories_id', 'status', 'lokasi_barang', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}