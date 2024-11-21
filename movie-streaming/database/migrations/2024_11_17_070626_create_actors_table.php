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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');                      // Actor's full name
            $table->date('date_of_birth')->nullable();               // Actor's date of birth
            $table->text('biography')->nullable();       // Actor's biography (optional)
            $table->string('profile_image')->nullable(); // Optional profile image URL or path
            $table->timestamps();                        // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
