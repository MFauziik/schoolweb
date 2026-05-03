<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('is_active') && $request->is_active !== '') {
            $query->where('is_active', $request->is_active);
        }

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

        $perPage = (int) $request->get('per_page', 10);
        
        return Inertia::render('Inventories/Index', [
            'inventories' => $query->paginate($perPage)->withQueryString(),
            'kategoris' => Inventory::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori'),
            'statuses' => Inventory::select('status')->distinct()->orderBy('status')->pluck('status'),
            'filters' => $request->only(['search', 'kategori', 'status', 'is_active']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Inventories/Create');
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
        return Inertia::render('Inventories/Show', [
            'inventory' => $inventory
        ]);
    }

    public function edit(Inventory $inventory)
    {
        return Inertia::render('Inventories/Edit', [
            'inventory' => $inventory
        ]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:inventories,kode_barang,' . $inventory->id,
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