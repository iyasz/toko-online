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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['1', '2'])->nullable();
            $table->string('telp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('password');
            $table->enum('is_active', ['1','2'])->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
