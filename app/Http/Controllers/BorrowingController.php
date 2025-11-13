<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Inventory;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('inventory')->latest()->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        // Hanya tampilkan barang yang aktif dan tidak sedang dipinjam
        $availableItems = Inventory::where('is_active', true)
            ->whereDoesntHave('borrowings', function($query) {
                $query->where('status_peminjaman', 'dipinjam');
            })
            ->get();
            
        return view('borrowings.create', compact('availableItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'peminjam_nama' => 'required|string|max:255',
            'peminjam_kelas' => 'required|string|max:255',
            'keperluan' => 'required|string'
        ]);

        // Tambahkan status peminjaman otomatis
        $validated['status_peminjaman'] = 'dipinjam';

        Borrowing::create($validated);

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dibuat.');
    }

    public function show(Borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $availableItems = Inventory::where('is_active', true)->get();
        return view('borrowings.edit', compact('borrowing', 'availableItems'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'peminjam_nama' => 'required|string|max:255',
            'peminjam_kelas' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan'
        ]);

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil diupdate.');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }

    // Method untuk mengembalikan barang
    public function return(Borrowing $borrowing)
    {
        $borrowing->update(['status_peminjaman' => 'dikembalikan']);

        return redirect()->route('borrowings.index')
            ->with('success', 'Barang berhasil dikembalikan.');
    }
}