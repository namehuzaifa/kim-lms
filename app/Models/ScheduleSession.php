<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleSession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grade_id',
        'title',
        'plan_price',
        'plan_hours',
        'customize_hour',
        'description',
        'recommended',
        'status',
    ];

    function getGrade() {
        return $this->belongsTo(SessionGrade::class, 'grade_id');
    }
}
