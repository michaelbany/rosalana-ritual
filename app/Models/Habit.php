<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $table = 'habits';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'schedule_days',
        'is_flexible',
        'weekly_goal',
        'current_version_id',
    ];

    protected $casts = [
        'schedule_days' => 'array',
        'is_flexible' => 'boolean',
        'weekly_goal' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currentVersion()
    {
        return $this->belongsTo(HabitVersion::class, 'current_version_id');
    }

    public function versions()
    {
        return $this->hasMany(HabitVersion::class);
    }

    public function activities()
    {
        return $this->hasManyThrough(
            HabitActivity::class,
            HabitVersion::class,
            'habit_id', // Foreign key on HabitVersion
            'habit_version_id', // Foreign key on HabitActivity
            'id', // Local key on Habit
            'id'  // Local key on HabitVersion
        )->where('habit_versions.id', $this->active_version_id);
    }

    public function allActivities()
    {
        return $this->hasManyThrough(HabitActivity::class, HabitVersion::class);
    }

    public function logs()
    {
        return $this->hasMany(HabitLog::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'mission_habits');
    }
}
