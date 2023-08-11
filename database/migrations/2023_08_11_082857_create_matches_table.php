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
        Schema::create('matches', function (Blueprint $table) {
            $table->id('match_id');
            $table->integer('home_team_id')->unsigned();
            $table->integer('away_team_id')->unsigned();
            $table->string('venue')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('home_goals')->default(0);
            $table->integer('away_goals')->default(0);
            $table->enum('result',  ['Lose', 'Draw', 'Win', 'Not Started'])->default('Not Started');
            $table->enum('league',  ['PremierLeague', 'FA', 'CommunityShield']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
