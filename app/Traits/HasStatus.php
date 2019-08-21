<?php

namespace HUAC\Traits;

use HUAC\Models\Log;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasStatus {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status() : HasMany
    {
        return $this->hasMany(Log::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function latestStatus() : HasOne
    {
        return $this->hasOne(Log::class)
            ->orderBy('created_at', 'desc');
    }

}
