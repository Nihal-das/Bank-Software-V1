<?php

namespace App\Listeners;

use App\Services\NavigationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;

class StoreNavMenu
{
    /**
     * Create the event listener.
     */
    public function __construct(protected NavigationService $navigationService) {}

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $modules = $this->navigationService
            ->getModulesForUser($event->user);

        session()->put('nav_modules', $modules);
    }
}
