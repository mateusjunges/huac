<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'name',
        'mother_name',
        'birthday_at',
        'gender',
        'medical_record',
    ];

    protected $dates = ['birthday_at'];

    /**
     * @return HasMany
     */
    public function surgeries() : HasMany
    {
        return $this->hasMany(Surgery::class);
    }
}
