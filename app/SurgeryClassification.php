<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurgeryClassification extends Model
{
    use SoftDeletes;

    protected $table = 'surgery_classifications';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = ['id'];

}
