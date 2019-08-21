<?php

namespace HUAC\Traits;

use HUAC\Models\Anesthesia;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasAnesthetics {

    /**
     * Return all surgery anesthetics.
     * @return mixed
     */
    public function anesthetics() : BelongsToMany
    {
        return $this->belongsToMany(Anesthesia::class, 'surgery_anesthetics');
    }

    /**
     * Determine if the surgery has the specified anesthesia.
     * @param $anesthesia
     * @return bool
     */
    public function hasAnesthesia($anesthesia) : bool
    {
        return (bool) $this->anesthetics()->where('anesthetics.id', $anesthesia)->count();
    }

    /**
     * Add anesthetics to the surgery.
     * @param array $anesthetics
     */
    public function attachAnesthetics(array $anesthetics)
    {
        $this->anesthetics()->attach($anesthetics);
    }

    /**
     * @param array $anesthetics
     */
    public function syncAnesthetics(array $anesthetics)
    {
        $this->anesthetics()->sync($anesthetics);
    }
}
