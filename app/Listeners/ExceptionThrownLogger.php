<?php

namespace App\Listeners;

use App\Events\ExceptionThrown;
use App\Models\Language;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ExceptionThrownLogger implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ExceptionThrown  $event
     * @return void
     */
    public function handle(ExceptionThrown $event)
    {
        Log::debug("unexpected error has occurred");
    }
}
