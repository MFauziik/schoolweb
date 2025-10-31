<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

        // Filter jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        // Filter status (optional)
        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // Search by nama, nip, jabatan, email, no_hp
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

        // Per page with whitelist
        $perPage = (int) $request->get('per_page', 10);
        $allowed = [10,25,50,100];
        if (!in_array($perPage, $allowed)) { $perPage = 10; }

        $teachers = $query->paginate($perPage);
        $teachers->appends($request->except('page'));

        // unique jabatan list for filter (from DB)
        $jabatans = Teacher::select('jabatan')->distinct()->orderBy('jabatan')->pluck('jabatan');

        return view('teachers.index', compact('teachers', 'jabatans'));
    }

    public function create()
    {
        return view('teachers.create');
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
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:teachers,nip,' . $teacher->id . '',
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