<?php
// app/Models/Inventory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    protected $fillable = ['kode_barang', 'nama_barang', 'kategori', 'status', 'lokasi_barang', 'is_active'];

    // Relationship dengan borrowing
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }

    // Method untuk mengecek apakah sedang dipinjam
    public function isBorrowed(): bool
    {
        return $this->borrowings()
            ->where('status_peminjaman', 'dipinjam') // update ke field baru
            ->exists();
    }

    // Method untuk mendapatkan peminjaman aktif
    public function activeBorrowing()
    {
        return $this->borrowings()
            ->where('status_peminjaman', 'dipinjam') // update ke field baru
            ->first();
    }

    // Method untuk mendapatkan status peminjaman (text)
    public function statusPeminjaman(): string
    {
        return $this->isBorrowed() ? 'Dipinjam' : 'Tersedia';
    }
}