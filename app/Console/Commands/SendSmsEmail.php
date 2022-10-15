<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\vehicledetail;
use DB;
use Carbon\Carbon;

class SendSmsEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsmsemail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms and email for inactive insurance.';

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
            $vehicledetail = vehicledetail::all();
            $userdetails = array();
            foreach($vehicledetail as $vehicledetail)
            {
                $customer_mobile = '';
                $customer_name = '';
                $registration_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->expiry_date) ? now()->diffInDays(Carbon::parse($vehicledetail->expiry_date)) : '';
                $insurance_expiry_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->insurance_expiry_date) ? now()->diffInDays(Carbon::parse($vehicledetail->insurance_expiry_date)) : '';
                $fitness_expiry_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->fitness_expiry_date) ? now()->diffInDays(Carbon::parse($vehicledetail->fitness_expiry_date)) : '';
                $mv_tax_expiry_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->mv_tax_expiry_date) ? now()->diffInDays(Carbon::parse($vehicledetail->mv_tax_expiry_date)) : '';
                $pucc_expiry_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->pucc_expiry_date) ? now()->diffInDays(Carbon::parse($vehicledetail->pucc_expiry_date)) : '';
                $permit_valid_upto_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->permit_valid_upto_date) ? now()->diffInDays(Carbon::parse($vehicledetail->permit_valid_upto_date)) : '';
                $policy_end_date_diff = (Carbon::now()->format('Y-m-d') < $vehicledetail->policy_end_date) ? now()->diffInDays(Carbon::parse($vehicledetail->policy_end_date)) : '';
                
                if($registration_date_diff != '' && $registration_date_diff >= 30 && $registration_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($insurance_expiry_date_diff != '' && $insurance_expiry_date_diff >= 30 && $insurance_expiry_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($fitness_expiry_date_diff != '' && $fitness_expiry_date_diff >= 30 && $fitness_expiry_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($mv_tax_expiry_date_diff != '' && $mv_tax_expiry_date_diff >= 30 && $mv_tax_expiry_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($pucc_expiry_date_diff != '' && $pucc_expiry_date_diff >= 30 && $pucc_expiry_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($permit_valid_upto_date_diff != '' && $permit_valid_upto_date_diff >= 30 && $permit_valid_upto_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                if($policy_end_date_diff != '' && $policy_end_date_diff >= 30 && $policy_end_date_diff <= 60)
                {
                    $customer_mobile = $vehicledetail->customer_mobile;
                    $customer_name = $vehicledetail->customer_name;
                }
                $userdetails[] = array('customer_name'=>$customer_name,'customer_mobile'=>$customer_mobile);
            }
            
            echo '<pre>';
            print_r($userdetails);
            //\Log::info($vehicledetail);
        }
        catch (Exception $e)
        {
            Log::error($e);
        }
    }
}
