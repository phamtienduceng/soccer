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
        Schema::create('teams', function (Blueprint $table) {
            $table->id('team_id');
            $table->string('team_name', 255);
            $table->bigInteger('tournament_id')->unsigned();
            $table->foreign('tournament_id')->references('tournament_id')->on('tournaments');
            $table->integer('win')->default(0);
            $table->integer('draw')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('points')->default(0);
            $table->string('country', 255);
            $table->string('logo', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
