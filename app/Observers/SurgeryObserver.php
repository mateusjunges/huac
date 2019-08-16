<?php

namespace HUAC\Observers;

use HUAC\Models\Log;
use HUAC\Models\Surgery;

class SurgeryObserver
{
    /**
     * Handle the surgery "created" event.
     *
     * @param  \HUAC\Surgery  $surgery
     * @return void
     */
    public function created(Surgery $surgery)
    {
        return Log::surgeryCreated($surgery);
    }

    /**
     * Handle the surgery "updated" event.
     *
     * @param  \HUAC\Surgery  $surgery
     * @return void
     */
    public function updated(Surgery $surgery)
    {
        //
    }

    /**
     * Handle the surgery "deleted" event.
     *
     * @param  \HUAC\Surgery  $surgery
     * @return void
     */
    public function deleted(Surgery $surgery)
    {
        //
    }

    /**
     * Handle the surgery "restored" event.
     *
     * @param  \HUAC\Surgery  $surgery
     * @return void
     */
    public function restored(Surgery $surgery)
    {
        //
    }

    /**
     * Handle the surgery "force deleted" event.
     *
     * @param  \HUAC\Surgery  $surgery
     * @return void
     */
    public function forceDeleted(Surgery $surgery)
    {
        //
    }
}
