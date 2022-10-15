<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\excelByScheduler;

class sendMailByScheduler extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $maiFrom = config('constants.mail_address.common_from_address');
         return $this->from($maiFrom, 'Durga Insurance Solution')->subject('Expired vehicle details')->view('sendMailByScheduler')->attach(Excel::download(new excelByScheduler(), 'vehiclelist.xlsx')->getFile(), ['as' => 'expired_vehicle_list.xlsx']);
    }
}
