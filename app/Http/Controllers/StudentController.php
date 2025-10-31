<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Filter by jurusan
        if ($request->has('jurusan') && !empty($request->jurusan)) {
            $query->where('jurusan', $request->jurusan);
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // Search functionality (optional - bisa dihapus jika tidak perlu)
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhere('kelas', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'nama');
        $sortOrder = $request->get('sort_order', 'asc');
        
        // Validate sort column to prevent SQL injection
        $allowedSortColumns = ['nama', 'nisn', 'kelas', 'jurusan', 'angkatan', 'tanggal_lahir', 'created_at'];
        if (!in_array($sortBy, $allowedSortColumns)) {
            $sortBy = 'nama';
        }
        
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 10);
        $students = $query->paginate($perPage);

        // Append query parameters to pagination links
        $students->appends($request->except('page'));

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'image|nullable|max:2048',
            'nisn' => 'required|unique:students',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'jurusan' => 'required|in:Pengembangan Perangkat Lunak dan Gim,Teknik Otomotif,Teknik Pengelasan dan Fabrikasi Logam,Broadcasting dan Film,Animasi',
            'tanggal_lahir' => 'required|date',
            'angkatan' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'foto' => 'image|nullable|max:2048',
            'nisn' => 'required|unique:students,nisn,' . $student->id .'',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'jurusan' => 'required|in:Pengembangan Perangkat Lunak dan Gim,Teknik Otomotif,Teknik Pengelasan dan Fabrikasi Logam,Broadcasting dan Film,Animasi',
            'tanggal_lahir' => 'required|date',
            'angkatan' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('foto')) {
            if ($student->foto) {
                Storage::delete('public/' . $student->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil diupdate.');
    }

    public function destroy(Student $student)
    {
        if ($student->foto) {
            Storage::delete('public/' . $student->foto);
        }
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus.');
    }
}