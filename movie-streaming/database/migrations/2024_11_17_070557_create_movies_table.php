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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');             // Movie title (e.g., "Inception")
            $table->text('description')->nullable();  // Movie description
            $table->date('release_date');        // Release date of the movie
            $table->decimal('rating', 3, 2)->nullable();  // Rating of the movie (e.g., 8.5/10)
            $table->string('poster_image')->nullable();   // URL or path to the poster image
            $table->timestamps();                // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
