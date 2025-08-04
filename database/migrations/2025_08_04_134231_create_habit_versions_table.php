<?php

use App\Models\Habit;
use App\Models\Mission;
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
        Schema::create('habit_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Habit::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Mission::class)->nullable()->constrained()->onDelete('set null'); // možná k ničemu
            $table->date('starts_at')->nullable(); // možná nebude k ničemu uplně 
            $table->date('ends_at')->nullable(); // možná bude stačit prostě habit_activities
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_versions');
    }
};
