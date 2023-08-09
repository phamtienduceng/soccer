<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name');
            $table->enum('user_role', ['Admin', 'Moderator', 'Member'])->default('Member');
            $table->enum('user_status', ['Active', 'Banned', 'Inactive'])->default('Active');
            $table->string('user_email')->unique();
            $table->string('user_phone')->nullable()->unique();
            $table->string('user_password');
            $table->string('user_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
