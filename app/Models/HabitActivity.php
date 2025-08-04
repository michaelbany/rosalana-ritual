<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitActivity extends Model
{
    protected $table = 'habit_activities';

    protected $fillable = [
        'habit_version_id',
        'label',
        'target_value',
        'unit',
    ];

    public function version()
    {
        return $this->belongsTo(HabitVersion::class, 'habit_version_id');
    }

    public function habit()
    {
        return $this->hasOneThrough(Habit::class, HabitVersion::class);
    }
}
