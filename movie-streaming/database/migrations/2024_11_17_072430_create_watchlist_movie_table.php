<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_watchlist_movie_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('watchlist_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key for users table
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('watchlist_movie');
    }
};
