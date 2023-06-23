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
        Schema::create('musicians_to_genre_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genres_group_id')->constrained('group_genres')->onDelete('cascade');
            $table->foreignId('musician_id')->constrained('musicians')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicians_to_genre_groups');
    }
};
