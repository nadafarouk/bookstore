<?php

namespace App\Listeners;

use App\Events\ExceptionThrownEvent;
use App\Models\Language;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ExceptionThrownLoggerListener implements ShouldQueue
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
     * @param  ExceptionThrownEvent  $event
     * @return void
     */
    public function handle(ExceptionThrownEvent $event)
    {
        Log::debug("unexpected error has occurred");
    }
}
