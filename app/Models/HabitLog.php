<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitLog extends Model
{
    protected $table = 'habit_logs';

    protected $fillable = [
        'user_id',
        'habit_id',
        'habit_version_id',
        'logged_at',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    public function version()
    {
        return $this->belongsTo(HabitVersion::class, 'habit_version_id');
    }
    
}
