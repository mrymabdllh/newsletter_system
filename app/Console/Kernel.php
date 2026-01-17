<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\AutoDeleteNewsletter::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('newsletters:auto-delete')->everyMinute();
    }
}
