<?php

namespace HUAC\Models;

use HUAC\Enums\Status;
use HUAC\Traits\HasAnesthetics;
use HUAC\Traits\HasStatus;
use HUAC\Traits\HasSurgeons;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 */
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
     * Return the surgery patient.
     * @return BelongsTo
     */
    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * Return the procedure of the surgery.
     * @return BelongsTo
     */
    public function procedure() : BelongsTo
    {
        return $this->belongsTo(Procedure::class, 'procedure_id');
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

    /**
     * Return all surgeries scheduled to the specified room.
     * @param Builder $query
     * @param $room
     * @return Builder
     */
    public function scopeRoom(Builder $query, $room)
    {
        return $query->whereHas('events', function ($query) use ($room) {
            $query->where('surgical_room_id', $room);
        });
    }
}
