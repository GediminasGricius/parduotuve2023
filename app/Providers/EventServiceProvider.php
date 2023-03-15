<?php

namespace App\Providers;

use App\Events\AddProductToOrder;
use App\Events\ProductEdited;
use App\Listeners\InformAdminProductEdited;
use App\Listeners\InformOwnerNewOrder;
use App\Listeners\InformUserProductEdited;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductEdited::class => [
            InformUserProductEdited::class,
            InformAdminProductEdited::class,
        ],
       // AddProductToOrder::class => [
       //       InformOwnerNewOrder::class

        //    ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {

            Event::listen(
                AddProductToOrder::class,
                [InformOwnerNewOrder::class, 'handle']
            );




    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
