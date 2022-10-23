<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\SendSmsEmail;
use App\Console\Commands\SendSmsEmailDaily;
use App\Console\Commands\SendSmsBetween07To15Days;
use App\Console\Commands\SendSmsBetweenTodayTo07Days;
use App\Console\Commands\SendSmsBetweenYesterdayToPast15Days;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */

    protected $commands = [
        SendSmsEmail::class,
        SendSmsEmailDaily::class,
        SendSmsBetween07To15Days::class,
        SendSmsBetweenTodayTo07Days::class,
        SendSmsBetweenYesterdayToPast15Days::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
         //$schedule->command('sendsmsemail:cron')->everyMinute();
         $schedule->command('sendsmsemaildaily:cron')->dailyAt('13:15')->timezone('Asia/Kolkata'); // send only email on daily basis
         //$schedule->command('SendSmsBetween30To60Days:cron')->everyMinute()->timezone('Asia/Kolkata');
         $schedule->command('SendSmsBetween07To15Days:cron')->weeklyOn(0, '8:00')->timezone('Asia/Kolkata'); // send whatsapp on sunday
         $schedule->command('SendSmsBetween07To15Days:cron')->weeklyOn(2, '8:00')->timezone('Asia/Kolkata'); // send whatsapp on tuesday
         $schedule->command('SendSmsBetween07To15Days:cron')->weeklyOn(5, '8:00')->timezone('Asia/Kolkata'); // send whatsapp on Friday

         //$schedule->command('SendSmsBetweenTodayTo07Days:cron')->dailyAt('9:00')->timezone('Asia/Kolkata'); // send whatsapp on daily basis
         $schedule->command('SendSmsBetweenTodayTo07Days:cron')->everyMinute()->timezone('Asia/Kolkata');

          $schedule->command('SendSmsBetweenYesterdayToPast15Days:cron')->weeklyOn(0, '7:00')->timezone('Asia/Kolkata'); // send whatsapp on sunday
         $schedule->command('SendSmsBetweenYesterdayToPast15Days:cron')->weeklyOn(2, '7:00')->timezone('Asia/Kolkata'); // send whatsapp on tuesday
         $schedule->command('SendSmsBetweenYesterdayToPast15Days:cron')->weeklyOn(5, '7:00')->timezone('Asia/Kolkata'); // send whatsapp on Friday
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
