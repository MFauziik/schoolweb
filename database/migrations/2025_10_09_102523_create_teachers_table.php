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
    Schema::create('teachers', function (Blueprint $table) {
        $table->id();
        $table->string('nip')->unique();
        $table->string('nama');
        $table->string('jabatan'); // Misal Guru Matematika
        $table->string('no_hp');
        $table->string('email')->unique();
        $table->text('alamat');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};