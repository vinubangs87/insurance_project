<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\vehicledetail;
use DB;
use Carbon\Carbon;

class SendSmsBetween30To60Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendSmsBetween30To60Days:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms and whatsapp for inactive insurance between 30 to 60 days from today once in a week.';

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
            $startDate = Carbon::now()->addDay(30)->format('Y-m-d');
            $endDate = Carbon::now()->addDay(60)->format('Y-m-d');
            $vehicledetail = vehicledetail::Where(function ($query) use ($startDate,$endDate) {
                      $query->whereBetween('expiry_date', [$startDate, $endDate]);
                      $query->orWhereBetween('insurance_expiry_date', [$startDate, $endDate]);
                      $query->orWhereBetween('fitness_expiry_date', [$startDate, $endDate]);
                      $query->orWhereBetween('mv_tax_expiry_date', [$startDate, $endDate]);
                      $query->orWhereBetween('pucc_expiry_date', [$startDate, $endDate]);
                      $query->orWhereBetween('permit_valid_upto_date', [$startDate, $endDate]);
                    })
                  ->Where('vehicledetails.deleted_at',null)
                  ->chunk(2, function($users) use ($startDate,$endDate,&$message) {
                    foreach ($users as $user) {

                    $message = 'Hi, some of your vehicle details will be expired.<br/>';
                    if($user->expiry_date > $startDate && $user->expiry_date <= $endDate)
                    {
                        $message .= 'Vehicle expiry date = '.$user->expiry_date;
                        //$expiry_date = $user->expiry_date;
                    }
                    if($user->insurance_expiry_date > $startDate && $user->insurance_expiry_date <= $endDate)
                    {
                        $message .= 'Insurance expiry date = '.$user->insurance_expiry_date;
                        //$insurance_expiry_date = $user->insurance_expiry_date;
                    }
                    if($user->fitness_expiry_date > $startDate && $user->fitness_expiry_date <= $endDate)
                    {
                        $message .= 'Fitness expiry date = '.$user->fitness_expiry_date;
                        //$fitness_expiry_date = $user->fitness_expiry_date;
                    }

                    echo $message;
                    echo '<br/><br/><br/>';
                    $message = '';
                 }
                });

            

/*echo '<pre>';
print_r($message);exit;*/

           /* $vehicledetail = vehicledetail::all();
            $userdetails = array();
            vehicledetail::orderBy('id')->chunk(2, function ($users) {
                 foreach ($users as $user) {
                    echo $user->id."=>".$user->customer_mobile." "."=>".$user->customer_name." ";
                    echo'<br/>';
                 }
              });*/
        }
        catch (Exception $e)
        {
            Log::error($e);
        }
    
    }
}
