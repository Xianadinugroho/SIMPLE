<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                  // Contoh: "12 RPL 1"
            $table->string('join_code', 10)->unique();              // Contoh: "A1B2C3"
            $table->foreignId('teacher_id')                         // Wali Kelas
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};