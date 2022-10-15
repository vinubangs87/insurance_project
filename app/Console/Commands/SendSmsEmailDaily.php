<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\vehicledetail;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMailByScheduler;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\excelByScheduler;

class SendSmsEmailDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsmsemaildaily:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms and email for inactive insurance on daily basis.';

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
        try
        {
            $mailTo = config('constants.mail_address.common_to_address');
            $result = Mail::to($mailTo)->send(new sendMailByScheduler());
        }
        catch (Exception $e)
        {
            Log::error($e);
        }
    }
}
