<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Inventory;

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'stats' => $stats,
        ]);
    }
}