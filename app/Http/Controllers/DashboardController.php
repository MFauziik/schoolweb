<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
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
        
        // Recent Activities Data
        $recentActivities = $this->getRecentActivities();

        return view('dashboard', array_merge($stats, [
            'recentActivities' => $recentActivities
        ]));
    }


    public function getRecentActivities()
    {
        $activities = [];

        // Recent Student Activities
        $recentStudents = Student::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        foreach ($recentStudents as $student) {
            $activities[] = [
                'type' => 'student_registered',
                'title' => 'Siswa baru terdaftar',
                'description' => "{$student->nama} telah terdaftar sebagai siswa baru",
                'time' => $student->created_at->diffForHumans(),
                'icon' => 'fa-user-plus',
                'color' => 'blue',
                'timestamp' => $student->created_at
            ];
        }

        // Recent Teacher Activities
        $recentTeachers = Teacher::orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        foreach ($recentTeachers as $teacher) {
            $activities[] = [
                'type' => 'teacher_registered',
                'title' => 'Guru baru bergabung',
                'description' => "{$teacher->nama} telah bergabung sebagai guru",
                'time' => $teacher->created_at->diffForHumans(),
                'icon' => 'fa-chalkboard-teacher',
                'color' => 'green',
                'timestamp' => $teacher->created_at
            ];
        }

        // Recent Inventory Activities
        $recentInventories = Inventory::orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        foreach ($recentInventories as $inventory) {
            $activities[] = [
                'type' => 'inventory_added',
                'title' => 'Fasilitas ditambahkan',
                'description' => "{$inventory->nama_barang} telah ditambahkan ke inventaris",
                'time' => $inventory->created_at->diffForHumans(),
                'icon' => 'fa-school',
                'color' => 'amber',
                'timestamp' => $inventory->created_at
            ];
        }

        // Sort activities by timestamp and take latest 5
        usort($activities, function($a, $b) {
            return $b['timestamp']->timestamp - $a['timestamp']->timestamp;
        });

        return array_slice($activities, 0, 5);
    }

    // API Methods for AJAX calls

    public function apiRecentActivities()
    {
        try {
            $recentActivities = $this->getRecentActivities();
            return response()->json([
                'success' => true,
                'data' => $recentActivities,
                'timestamp' => Carbon::now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get recent activities',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function apiDashboardStats()
    {
        try {
            $stats = [
                'studentCount' => Student::count(),
                'teacherCount' => Teacher::count(),
                'inventoryCount' => Inventory::count(),
                'activeStudents' => Student::where('is_active', true)->count(),
                'activeTeachers' => Teacher::where('is_active', true)->count(),
                'activeInventories' => Inventory::where('is_active', true)->count(),
            ];

            return response()->json([
                'success' => true,
                'data' => $stats,
                'timestamp' => Carbon::now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get dashboard stats',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}