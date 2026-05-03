<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Inventory;
use Illuminate\Http\Request;

use Inertia\Inertia;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('inventory')->latest()->paginate(10);
        
        return Inertia::render('Borrowings/Index', [
            'borrowings' => $borrowings
        ]);
    }

    public function create()
    {
        // Hanya tampilkan barang yang aktif dan tidak sedang dipinjam
        $availableItems = Inventory::where('is_active', true)
            ->whereDoesntHave('borrowings', function($query) {
                $query->where('status_peminjaman', 'dipinjam');
            })
            ->get();
            
        return Inertia::render('Borrowings/Create', [
            'availableItems' => $availableItems
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'peminjam_nama' => 'required|string|max:255',
            'peminjam_kelas' => 'required|string|max:255',
            'keperluan' => 'required|string'
        ]);

        $validated['status_peminjaman'] = 'dipinjam';

        Borrowing::create($validated);
        
        Inventory::where('id', $validated['inventory_id'])->update(['status' => 'Dipinjam']);

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dibuat.');
    }

    public function show(Borrowing $borrowing)
    {
        return Inertia::render('Borrowings/Show', [
            'borrowing' => $borrowing->load('inventory')
        ]);
    }

    public function edit(Borrowing $borrowing)
    {
        $availableItems = Inventory::where('is_active', true)->get();
        
        return Inertia::render('Borrowings/Edit', [
            'borrowing' => $borrowing,
            'availableItems' => $availableItems
        ]);
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

        $old_inventory_id = $borrowing->inventory_id;
        $old_status = $borrowing->status_peminjaman;

        $borrowing->update($validated);
        
        $new_inventory_id = $borrowing->inventory_id;
        $new_status = $borrowing->status_peminjaman;

        if ($old_inventory_id != $new_inventory_id) {
            // Swapped inventory
            if ($old_status === 'dipinjam') {
                Inventory::where('id', $old_inventory_id)->update(['status' => 'Tersedia']);
            }
            if ($new_status === 'dipinjam') {
                Inventory::where('id', $new_inventory_id)->update(['status' => 'Dipinjam']);
            }
        } else if ($old_status !== $new_status) {
            // Status changed but same inventory
            if ($new_status === 'dipinjam') {
                Inventory::where('id', $new_inventory_id)->update(['status' => 'Dipinjam']);
            } else if ($new_status === 'dikembalikan') {
                Inventory::where('id', $new_inventory_id)->update(['status' => 'Tersedia']);
            }
        }

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil diupdate.');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status_peminjaman === 'dipinjam') {
            Inventory::where('id', $borrowing->inventory_id)->update(['status' => 'Tersedia']);
        }
        $borrowing->delete();
        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function return(Borrowing $borrowing)
    {
        $borrowing->update(['status_peminjaman' => 'dikembalikan']);
        Inventory::where('id', $borrowing->inventory_id)->update(['status' => 'Tersedia']);

        return redirect()->route('borrowings.index')
            ->with('success', 'Barang berhasil dikembalikan.');
    }
}