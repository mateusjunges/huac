<?php

namespace HUAC\Models;

use HUAC\Enums\Status;
use HUAC\Traits\HasAnesthetics;
use HUAC\Traits\HasStatus;
use HUAC\Traits\HasSurgeons;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgery extends Model
{
    use SoftDeletes,
        HasAnesthetics,
        HasSurgeons,
        HasStatus;

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
     * @param Builder $query
     * @return mixed
     */
    public function scopeWithDeniedMaterials(Builder $query)
    {
        return $this->whereHas('status', function ($query) {
           $query->whereIn('status_id', [
               Status::MATERIALS_DENIED_BY_CME,
               Status::MATERIALS_DENIED_BY_SURGERY_CENTER
           ]);
        });
    }
}
