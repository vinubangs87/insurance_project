<?php

namespace App\Exports;

use App\Models\vehicledetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;
use Carbon\Carbon;


class vehicleDetailsExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct($daterange)
    {
        $this->daterange = $daterange;
    }

    public function headings(): array
    {
        return ["Insurance company","Broker/IRDA", "Product type", "Product name", "Fuel type", "Permit type", "Customer name", "Customer mobile", "Customer email", "Customer address", "Vehicle number", "Registration number", "Registration date", "Registration expiry date", "Insurance start date", "Insurance expiry date", "Insurance amount", "Fitness expiry date", "MV tax expiry date", "PUCC expiry date", "Finance type", "Finance company", "Permit number", "Permit valid upto date", "Policy number", "Renewal premium", "Engine number", "Chasis number"];
    }   
 
    public function collection()
    {
        $daterange = explode(" - ",$this->daterange);
        $start_date = $daterange[0];
        $end_date = $daterange[1];
        $start_date = Carbon::createFromFormat('d-m-Y', $start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d-m-Y', $end_date)->format('Y-m-d');

\DB::enableQueryLog();
        return $results = DB::table('vehicledetails')
              ->leftjoin('insurance_companies','vehicledetails.insuranceCompany_id','=','insurance_companies.id')
              ->leftjoin('brokers','vehicledetails.broker_id','=','brokers.id')
              ->leftjoin('producttypes','vehicledetails.producttype_id','=','producttypes.id')
              ->leftjoin('procuctnames','vehicledetails.procuctname_id','=','procuctnames.id')
              ->leftjoin('enginetypes','vehicledetails.enginetype_id','=','enginetypes.id')
              ->leftjoin('permittypes','vehicledetails.permittype_id','=','permittypes.id')
              ->leftjoin('financecompanies','vehicledetails.financecompany_id','=','financecompanies.id') 
              ->select('vehicledetails.*','insurance_companies.title AS ic_title','brokers.title AS br_title','producttypes.title AS p_title','procuctnames.title AS pn_title','enginetypes.title AS et_title','permittypes.title AS pt_title','financecompanies.title AS fc_title')                    
              ->Where(function ($query) use ($start_date,$end_date) {
                  $query->whereBetween('expiry_date', [$start_date, $end_date]);
                  $query->orWhereBetween('insurance_expiry_date', [$start_date, $end_date]);
                  $query->orWhereBetween('fitness_expiry_date', [$start_date, $end_date]);
                  $query->orWhereBetween('mv_tax_expiry_date', [$start_date, $end_date]);
                  $query->orWhereBetween('pucc_expiry_date', [$start_date, $end_date]);
                  $query->orWhereBetween('permit_valid_upto_date', [$start_date, $end_date]);
            })
            ->Where('vehicledetails.deleted_at',null)
            ->get();
//dd(\DB::getQueryLog());
    }

    // here you select the row that you want in the file
    public function map($row): array{
           $fields = [
            $row->ic_title,
            $row->br_title,
            $row->p_title,
            $row->pn_title,
            $row->et_title,
            $row->pt_title,
            $row->customer_name,
            $row->customer_mobile,
            $row->customer_email,
            $row->customer_address,
            $row->vehicle_number,
            $row->registration_number,
            !empty($row->registration_date) ? Carbon::createFromFormat('Y-m-d', $row->registration_date)->format('d/m/Y') : '',
            !empty($row->expiry_date) ? Carbon::createFromFormat('Y-m-d', $row->expiry_date)->format('d/m/Y') : '',
            !empty($row->insurance_start_date) ? Carbon::createFromFormat('Y-m-d', $row->insurance_start_date)->format('d/m/Y') : '',
            !empty($row->insurance_expiry_date) ? Carbon::createFromFormat('Y-m-d', $row->insurance_expiry_date)->format('d/m/Y') : '',
            $row->insurance_amount,
           !empty($row->fitness_expiry_date) ?  Carbon::createFromFormat('Y-m-d', $row->fitness_expiry_date)->format('d/m/Y') : '',
            !empty($row->mv_tax_expiry_date) ? Carbon::createFromFormat('Y-m-d', $row->mv_tax_expiry_date)->format('d/m/Y') : '',
            !empty($row->pucc_expiry_date) ? Carbon::createFromFormat('Y-m-d', $row->pucc_expiry_date)->format('d/m/Y') : '',
            ($row->finance_type) ? 'Yes' : 'No',
            $row->fc_title,
            $row->permit_number,
            !empty($row->permit_valid_upto_date) ? Carbon::createFromFormat('Y-m-d', $row->permit_valid_upto_date)->format('d/m/Y') : '',
            $row->policy_number,
            $row->renewal_premium,
            $row->engine_number,
            $row->chasis_number,
         ];
        return $fields;
    }
}
