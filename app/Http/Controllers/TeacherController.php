<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

use Inertia\Inertia;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('nip', 'like', "%{$s}%")
                  ->orWhere('jabatan', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('no_hp', 'like', "%{$s}%");
            });
        }

        $perPage = (int) $request->get('per_page', 10);
        
        return Inertia::render('Teachers/Index', [
            'teachers' => $query->paginate($perPage)->withQueryString(),
            'jabatans' => Teacher::select('jabatan')->distinct()->orderBy('jabatan')->pluck('jabatan'),
            'filters' => $request->only(['search', 'jabatan', 'status']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Teachers/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:teachers',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string',
            'email' => 'required|email|unique:teachers',
            'alamat' => 'required|string|max:500',
            'is_active' => 'required|boolean',
        ]);

        Teacher::create($validated);
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function show(Teacher $teacher)
    {
        return Inertia::render('Teachers/Show', [
            'teacher' => $teacher
        ]);
    }

    public function edit(Teacher $teacher)
    {
        return Inertia::render('Teachers/Edit', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:teachers,nip,' . $teacher->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'alamat' => 'required|string|max:500',
            'is_active' => 'required|boolean',
        ]);

        $teacher->update($validated);
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diupdate.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus.');
    }
}