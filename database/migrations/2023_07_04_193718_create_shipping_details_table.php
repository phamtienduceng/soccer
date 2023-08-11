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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->string('shipping_full_name');
            $table->string('shipping_email');
            $table->string('shipping_phone_number', 10);
            $table->string('shipping_address');
            $table->string('shipping_province');
            $table->string('shipping_district');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
