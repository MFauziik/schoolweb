<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query();

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter status barang (kolom 'status')
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter aktif/non-aktif (opsional)
        if ($request->has('is_active') && $request->is_active !== '') {
            $query->where('is_active', $request->is_active);
        }

        // Search: nama_barang, kode_barang, kategori, status, lokasi_barang
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama_barang', 'like', "%{$s}%")
                  ->orWhere('kode_barang', 'like', "%{$s}%")
                  ->orWhere('kategori', 'like', "%{$s}%")
                  ->orWhere('status', 'like', "%{$s}%")
                  ->orWhere('lokasi_barang', 'like', "%{$s}%");
            });
        }

        // Per page whitelist
        $perPage = (int) $request->get('per_page', 10);
        $allowed = [10,25,50,100];
        if (!in_array($perPage, $allowed)) { $perPage = 10; }

        $inventories = $query->paginate($perPage);
        $inventories->appends($request->except('page'));

        // Data distinct untuk filter
        $kategoris = Inventory::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');
        $statuses = Inventory::select('status')->distinct()->orderBy('status')->pluck('status');

        return view('inventories.index', compact('inventories', 'kategoris', 'statuses'));
    }

    public function create()
    {
        return view('inventories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:inventories',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'lokasi_barang' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        Inventory::create($validated);
        return redirect()->route('inventories.index')->with('success', 'Inventaris berhasil ditambahkan.');
    }

    public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:inventories,kode_barang,' . $inventory->id . '',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'lokasi_barang' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $inventory->update($validated);
        return redirect()->route('inventories.index')->with('success', 'Inventaris berhasil diupdate.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Inventaris berhasil dihapus.');
    }
}