<?php

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
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('schedule_days')->nullable(); // buď konkrétní dny
            $table->boolean('is_flexible')->default(false); // nebo 3krat tydně kdykoliv
            $table->unsignedTinyInteger('weekly_goal')->nullable(); // počet opakování za týden
            $table->foreignIdFor(HabitVersion::class, 'current_version_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
