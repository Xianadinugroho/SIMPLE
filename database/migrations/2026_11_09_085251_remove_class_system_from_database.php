<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
        });

        Schema::dropIfExists('classes');
    }

    public function down(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('join_code', 10)->unique();
            $table->foreignId('teacher_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('class_id')
                ->nullable()
                ->constrained('classes')
                ->nullOnDelete();
        });
    }
};