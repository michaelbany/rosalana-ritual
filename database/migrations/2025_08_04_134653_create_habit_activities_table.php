<?php

use App\Models\HabitVersion;
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
        Schema::create('habit_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HabitVersion::class)->constrained()->onDelete('cascade');
            $table->string('label'); // nazev aktivity
            $table->unsignedInteger('target_value')->nullable(); // cíl aktivity, např. počet opakování
            $table->string('unit')->nullable(); // jednotka aktivity, např. "minuty", "opakování"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_activities');
    }
};
