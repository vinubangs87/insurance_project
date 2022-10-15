<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vehicleDetailsValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'insuranceCompany_id'=> 'required',
            'broker_id'=> 'required',
            'producttype_id'=> 'required',
            'procuctname_id'=> 'required',
            'enginetype_id'=> 'required',
            'permittype_id'=> 'required',
            'customer_name'=> 'required',
            'customer_mobile'=> 'required|numeric|digits:10',
            'customer_email'=> 'nullable|email:rfc,dns',
            'customer_address'=> 'required',
            'vehicle_number'=> 'required|unique:vehicledetails,vehicle_number,NULL,id,deleted_at,NULL',
            //'registration_number'=> 'required',
            'registration_date'=> 'required|date_format:d/m/Y',
            'expiry_date'=> 'required|date_format:d/m/Y',
            'insurance_start_date'=> 'required|date_format:d/m/Y',
            'insurance_expiry_date'=> 'required|date_format:d/m/Y',
            'fitness_expiry_date'=> 'required|date_format:d/m/Y',
            'mv_tax_expiry_date'=> 'required|date_format:d/m/Y',
            'pucc_expiry_date'=> 'required|date_format:d/m/Y',
            'finance_type'=> 'required',
            'financecompany_id' => 'required_if:finance_type,1',
            //'permit_number'=> 'required',
            'permit_valid_upto_date'=> 'required|date_format:d/m/Y',
            'policy_number'=> 'required',
            //'policy_start_date'=> 'required|date_format:d/m/Y',
            //'policy_end_date'=> 'required|date_format:d/m/Y',
            //'insurance_amount'=> 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'This field is required',
            'required_if' => 'This field is required',
            'date' => 'Please enter valid date format',
            'numeric' => 'Please enter valid phone format',
            'digits' => 'Phone number length should be 10',
            'unique' => 'This vehicle number is already registered.',
        ];
    }
}
