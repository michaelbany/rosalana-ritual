<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitVersion extends Model
{
    protected $table = 'habit_versions';

    protected $fillable = [
        'habit_id',
        'mission_id',
        'starts_at',
        'ends_at',
        'note'
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    public function habit()
    {
        return $this->belongsTo(Habit::class, 'habit_id');
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function activities()
    {
        return $this->hasMany(HabitActivity::class);
    }

    public function logs()
    {
        return $this->hasMany(HabitLog::class);
    }
}
