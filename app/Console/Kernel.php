<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\SendSmsEmail;
use App\Console\Commands\SendSmsEmailDaily;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */

    protected $commands = [
        SendSmsEmail::class,
        SendSmsEmailDaily::class

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
         $schedule->command('sendsmsemail:cron')->everyMinute();
         $schedule->command('sendsmsemaildaily:cron')->dailyAt('13:15')->timezone('Asia/Kolkata'); // send only email on daily basis
         $schedule->command('SendSmsBetween30To60Days:cron')->everyMinute()->timezone('Asia/Kolkata');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
