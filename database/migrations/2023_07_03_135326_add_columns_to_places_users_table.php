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
        Schema::table('places_users', function (Blueprint $table) {
            $table->integer('music')->nullable();
            $table->integer('vibe')->nullable();
            $table->integer('drinks')->nullable();
            $table->integer('cleanness')->nullable();
            $table->integer('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places_users', function (Blueprint $table) {
            //
        });
    }
};
