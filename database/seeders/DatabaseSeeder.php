<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Inventory;
use App\Models\Borrowing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Generate Students
        Student::factory()->count(50)->create();

        // Generate Teachers
        Teacher::factory()->count(20)->create();

        // Generate Inventories
        Inventory::factory()->count(30)->create();

        // Generate Borrowings for some inventories
        $inventories = Inventory::all();
        foreach ($inventories->random(15) as $inventory) {
            Borrowing::factory()->create([
                'inventory_id' => $inventory->id,
            ]);
        }
    }
}