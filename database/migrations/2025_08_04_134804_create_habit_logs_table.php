<?php

use App\Models\Habit;
use App\Models\HabitVersion;
use App\Models\User;
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
        Schema::create('habit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Habit::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(HabitVersion::class)->constrained()->onDelete('cascade');
            $table->dateTime('logged_at'); // čas, kdy byl habit zaznamenán
            $table->unsignedInteger('value')->default(1); // kolikrát to bylo splněno, např. 20 stran knihy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_logs');
    }
};
