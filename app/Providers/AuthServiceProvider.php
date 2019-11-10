<?php

namespace HUAC\Providers;

use HUAC\Policies\ConfirmMaterialsPolicy;
use HUAC\Policies\GroupsPolicy;
use HUAC\Policies\PatientsPolicy;
use HUAC\Policies\ProceduresPolicy;
use HUAC\Policies\RoomsPolicy;
use HUAC\Policies\SchedulingPolicy;
use HUAC\Policies\SurgeonsPolicy;
use HUAC\Policies\SurgeriesPolicy;
use HUAC\Policies\UsersPolicy;
use HUAC\Policies\WaitingListPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(env('PASSPORT_TOKEN_EXPIRES_IN', 15)));

        Gate::before(function ($user, $ability) {
            return $user->hasPermission('admin') ? true : null;
        });


        Gate::define('patients.manage', [PatientsPolicy::class, 'manage']);
        Gate::define('surgeries.manage', [SurgeriesPolicy::class, 'manage']);
        Gate::define('waiting-list.manage', [WaitingListPolicy::class, 'manage']);
        Gate::define('confirm-materials.manage', [ConfirmMaterialsPolicy::class, 'manage']);
        Gate::define('confirm-materials.cme', [ConfirmMaterialsPolicy::class, 'cme']);
        Gate::define('confirm-materials.surgery-center', [ConfirmMaterialsPolicy::class, 'surgeryCenter']);
        Gate::define('users.manage', [UsersPolicy::class, 'manage']);
        Gate::define('groups.manage', [GroupsPolicy::class, 'manage']);
        Gate::define('rooms.manage', [RoomsPolicy::class, 'manage']);
        Gate::define('procedures.manage', [ProceduresPolicy::class, 'manage']);
        Gate::define('scheduling.manage', [SchedulingPolicy::class, 'manage']);
        Gate::define('surgeons.manage', [SurgeonsPolicy::class, 'manage']);
    }
}
