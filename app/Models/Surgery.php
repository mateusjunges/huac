<?php

namespace HUAC\Models;

use HUAC\Traits\HasAnesthetics;
use HUAC\Traits\HasSurgeons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgery extends Model
{
    use SoftDeletes,
        HasAnesthetics,
        HasSurgeons;

    protected $table = 'surgeries';

    protected $fillable = [
        'estimated_duration_time',
        'anesthetic_evaluation',
        'materials',
        'observation',
        'procedure_id',
        'surgery_classification_id',
        'patient_id',
    ];

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'surgery_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status()
    {
        return $this->hasMany(Log::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function latestStatus()
    {
        return $this->hasOne(Log::class)
            ->orderBy('created_at', 'desc');
    }
}
