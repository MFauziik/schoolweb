<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable(); // Path foto
        $table->string('nisn')->unique();
        $table->string('nama');
        $table->string('kelas'); // Misal X, XI, XII
        $table->enum('jurusan', [
            'Pengembangan Perangkat Lunak dan Gim',
            'Teknik Otomotif',
            'Teknik Pengelasan dan Fabrikasi Logam',
            'Broadcasting dan Film',
            'Animasi'
        ]);
        $table->date('tanggal_lahir');
        $table->integer('angkatan'); // Misal 2023
        $table->boolean('is_active')->default(true); // Aktif atau tidak
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};