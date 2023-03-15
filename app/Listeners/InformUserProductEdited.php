<?php

namespace App\Listeners;

use App\Events\ProductEdited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InformUserProductEdited
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductEdited $event): void
    {

        echo "Vartotojas informuotas";
    }
}
