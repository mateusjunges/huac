<?php

namespace HUAC\Traits;

use HUAC\Models\Log;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Return all surgeries with the specified status.
     *
     * @param Builder $query
     * @param $status
     * @return mixed
     */
    public function scopeWithStatus(Builder $query, $status)
    {
        if (is_array($status)) {
            return $this->whereHas('status', function ($query) use($status) {
               $query->where(function($query) use ($status) {
                  foreach ($status as $s) {
                      $query->orWhere('status_id', $s);
                  }
               });
            });
        }
        return $this->whereHas('status', function ($query) use ($status) {
           $query->where('status_id', $status);
        });
    }

}
