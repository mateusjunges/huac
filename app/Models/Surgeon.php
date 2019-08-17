<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgeon extends Model
{

    use SoftDeletes;

    protected $table = 'surgeons';

    protected $fillable = [
        'crm',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scopeName()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the surgeon name.
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->user()->first()->name;
    }
}
