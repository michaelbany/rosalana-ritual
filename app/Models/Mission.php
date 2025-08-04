<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habits()
    {
        return $this->belongsToMany(Habit::class, 'mission_habits');
    }

    public function versions()
    {
        return $this->hasMany(HabitVersion::class);
    }

    
}
