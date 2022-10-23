<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class SendSmsBetweenTodayTo07Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendSmsBetweenTodayTo07Days:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send whatsapp for inactive insurance between today to 07 days from today 3 days in a week.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {        
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->addDay(7)->format('Y-m-d');
        $result = whatsapp_message($startDate, $endDate);
    }
}
