<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', [
                'semester', 'passport_skills', 'toeic', 'tka',
                'ijasah', 'transkrip_nilai', 'ukk', 'pkl'
            ]);
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_mime');
            $table->string('semester')->nullable();
            $table->year('tahun_ajaran')->nullable();
            $table->string('qr_code_path')->nullable();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamp('verified_at')->nullable();
            $table->text('verification_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};