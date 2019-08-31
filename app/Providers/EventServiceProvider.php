<?php

namespace HUAC\Providers;

use HUAC\Events\MaterialsConfirmedByCME;
use HUAC\Events\MaterialsDeniedByCME;
use HUAC\Events\SurgeryDeletedEvent;
use HUAC\Events\SurgeryScheduledEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SurgeryScheduledEvent::class => [
            // Event listeners here.
        ],
        SurgeryDeletedEvent::class => [
            // Event listeners here.
        ],
        MaterialsConfirmedByCME::class => [
            // Event listeners here.
        ],
        MaterialsDeniedByCME::class => [
            // Event listeners here.
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
