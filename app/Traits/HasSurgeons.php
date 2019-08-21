<?php

namespace HUAC\Traits;

use HUAC\Models\Surgeon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasSurgeons {

    /**
     * Return all the surgery surgeons.
     * @return BelongsToMany
     */
    public function surgeons() : BelongsToMany
    {
        return $this->belongsToMany(Surgeon::class, 'surgeon_has_surgeries');
    }

    /**
     * Return the surgery Head surgeon.
     * @return BelongsToMany
     */
    public function headSurgeon() : BelongsToMany
    {
        return $this->surgeons()->where('surgeon_has_surgeries.head_surgeon', true);
    }

    /**
     * Return the assistant surgeon of the surgery.
     * @return BelongsToMany
     */
    public function assistantSurgeon() : BelongsToMany
    {
        return $this->surgeons()->where('surgeon_has_surgeries.head_surgeon', false);
    }

    /**
     * @param Surgeon $surgeon
     * @return $this
     */
    public function assignAssistantSurgeon(Surgeon $surgeon)
    {
        if (! is_null($this->assistantSurgeon()->first()))
            $this->assistantSurgeon()->detach();
        $this->surgeons()->attach($surgeon->id, [
            'head_surgeon' => false,
        ]);
        return $this;
    }

    /**
     * Assign the head surgeon to the surgery.
     * @param Surgeon $surgeon
     * @return $this
     */
    public function assignHeadSurgeon(Surgeon $surgeon)
    {
        if (! is_null($this->headSurgeon()->first()))
            $this->headSurgeon()->detach();
        $this->surgeons()->attach($surgeon->id, [
            'head_surgeon' => true,
        ]);
        return $this;
    }



}
