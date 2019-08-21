<?php

namespace HUAC\Models;

use HUAC\Enums\Status as Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    use SoftDeletes;

    protected $table = 'logs';

    protected $guarded = ['id'];

    protected $fillable = [
        'observation',
        'surgery_id',
        'status_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Create a log with the specified params.
     *
     * @param Surgery $surgery
     * @param $observation
     * @param $status
     * @return mixed
     */
    public static function createFor(Surgery $surgery, $observation, $status)
    {
        return static::create([
            'surgery_id'  => $surgery->id,
            'user_id'     => Auth::id(),
            'observation' => $observation,
            'status_id'   => $status
        ]);
    }

    /**
     * Log created when a surgery is added.
     * @param Surgery $surgery
     * @return mixed
     */
    public static function surgeryCreated(Surgery $surgery)
    {
        return static::create([
            'surgery_id'  => $surgery->id,
            'user_id'     => Auth::id(),
            'observation' => 'Cirurgia adicionada pelo médico!',
            'status_id'   => Status::IN_PROCESS
        ]);
    }
}
