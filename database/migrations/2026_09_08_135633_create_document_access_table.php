<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('document_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('access_type', ['view', 'edit', 'delete'])->default('view');
            $table->timestamps();

            $table->unique(['document_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_access');
    }
};