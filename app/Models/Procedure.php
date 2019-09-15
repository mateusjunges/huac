<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use SoftDeletes;

    protected $table = 'procedures';

    protected $fillable = [
        'name',
        'sus_code',
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return HasMany
     */
    public function surgeries() : HasMany
    {
        return $this->hasMany(Surgery::class, 'procedure_id');
    }
}
