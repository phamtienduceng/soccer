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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('products_id');
            $table->string('products_model');
            $table->unsignedInteger('categories_id'); // Thêm cột categories_id
            $table->foreign('categories_id')->references('categories_id')->on('categories')->onDelete('cascade');
            $table->string('products_price');
            $table->string('products_material');
            $table->string('products_size');
            $table->string('products_style');
            $table->string('products_maxload');
            $table->text('products_thumbnails')->nullable();
            $table->json('products_gallery')->nullable(); 
            $table->enum('products_status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
