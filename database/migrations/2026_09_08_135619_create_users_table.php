<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            // Role
            $table->enum('role', ['kurikulum', 'guru', 'siswa'])->default('siswa');
            $table->string('nip')->nullable();
            $table->string('nis')->nullable();
            $table->string('kelas')->nullable();
            $table->string('program_studi')->nullable();
            $table->enum('position', ['guru_biasa', 'wali_kelas', 'kapro', 'pokja', 'pkl'])->nullable();
            
            // Profile
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};