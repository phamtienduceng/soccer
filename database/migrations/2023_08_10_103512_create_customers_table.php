<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable(); // 'male', 'female', 'other'
            $table->date('date_of_birth')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable(); // URL or path to the user's avatar
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_active')->default(true); // to check if the user is active or not
            $table->rememberToken();
            $table->string('referral_code')->nullable(); // If you have a referral system
            $table->unsignedBigInteger('referred_by')->nullable(); // ID of the user who referred this user
            $table->timestamps();
            $table->softDeletes(); // If you want to implement soft delete

            // Foreign key for the referral system
            $table->foreign('referred_by')->references('id')->on('users')->onDelete('set null');
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
