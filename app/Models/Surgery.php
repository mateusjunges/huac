<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
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

    /**
     * Assign the head surgeon to the surgery.
     * @param Surgeon $surgeon
     * @return $this
     */
    public function assignHeadSurgeon(Surgeon $surgeon)
    {
        SurgeonHasSurgery::create([
           'surgery_id'   => $this->id,
           'surgeon_id'   => $surgeon->id,
           'head_surgeon' => true,
        ]);
        return $this;
    }

    /**
     * Assign the assistant surgeon to the surgery.
     * @param Surgeon $surgeon
     * @return $this
     */
    public function assignAssistantSurgeon(Surgeon $surgeon)
    {
        SurgeonHasSurgery::create([
            'surgery_id'   => $this->id,
            'surgeon_id'   => $surgeon->id,
            'head_surgeon' => false
        ]);

        return $this;
    }

    /**
     * Return the surgery head surgeon.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function headSurgeon()
    {
        return $this->hasOne(SurgeonHasSurgery::class, 'surgery_id')
            ->where('head_surgeon', true);
    }

    /**
     * Return the surgery assistant surgeon.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assistantSurgeon()
    {
        return $this->hasOne(SurgeonHasSurgery::class, 'surgery_id')
            ->where('head_surgeon', false);
    }
}
