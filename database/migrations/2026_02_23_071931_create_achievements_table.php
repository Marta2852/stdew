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
    Schema::create('achievements', function (Blueprint $table) {
        $table->id();
        $table->string('name');            // e.g., "First Fish"
        $table->string('description');     // e.g., "Catch your first fish"
        $table->string('image_path');      // path to achievement image
        $table->boolean('is_unlocked')->default(false);
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
