<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Coaching extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'subject_id',
        'title',
        'slug',
        'blackout_dates',
        'coach_name',
        'description',
        'image_id',
        'month_limit',
        'break',
        'price_per_session',
        'session_limit',
        'status',
        'product_id',
        'price_id',
        'is_active',
    ];

    public function getUser()
    {
       return $this->belongsTo(User::class,'user_id');
    }

    public function getSubject()
    {
       return $this->belongsTo(Subject::class,'subject_id');
    }

    public function getslots()
    {
       return $this->hasMany(Slot::class,'coaching_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('allowance_scope', function (Builder $builder) {
            $builder->where('is_active', 1);
        });
    }

}
