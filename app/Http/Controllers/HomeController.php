<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Inventory;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'studentCount' => Student::count(),
            'teacherCount' => Teacher::count(),
            'inventoryCount' => Inventory::count(),
            'activeStudents' => Student::where('is_active', true)->count(),
            'activeTeachers' => Teacher::where('is_active', true)->count(),
            'activeInventories' => Inventory::where('is_active', true)->count(),
        ];

        return view('home', $stats);
    }
}