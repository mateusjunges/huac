<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgery extends Model
{
    use SoftDeletes;

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
    public function events() : HasMany
    {
        return $this->hasMany(Event::class, 'surgery_id');
    }
}
