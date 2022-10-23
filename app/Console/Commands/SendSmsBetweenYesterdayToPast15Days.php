<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class SendSmsBetweenYesterdayToPast15Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendSmsBetweenYesterdayToPast15Days:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send whatsapp for inactive insurance between yesterday to previous 15 days from today (Already expired dates for previous 15 days from today).';

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
        $startDate = Carbon::now()->subDays(15)->format('Y-m-d');
        $endDate = Carbon::now()->subDays(1)->format('Y-m-d');
        $result = whatsapp_message_expired($startDate, $endDate);
    }
}
