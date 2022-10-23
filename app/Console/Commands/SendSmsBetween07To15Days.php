<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class SendSmsBetween07To15Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendSmsBetween07To15Days:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send whatsapp for inactive insurance between 08 to 15 days from today 3 days in a week.';

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
        $startDate = Carbon::now()->addDay(8)->format('Y-m-d');
        $endDate = Carbon::now()->addDay(15)->format('Y-m-d');
        $result = whatsapp_message($startDate, $endDate);
    }
}
