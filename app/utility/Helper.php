<?php
use App\Models\vehicledetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


function whatsapp_message($startDate, $endDate){

	try
	{
		$instance_id = config('constants.whatsapp_credentials.instance_id');
		$access_token = config('constants.whatsapp_credentials.access_token');

	    \DB::enableQueryLog();
	    $vehicledetail = vehicledetail::Where(function ($query) use ($startDate,$endDate) {
	              $query->whereBetween('expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('insurance_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('fitness_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('mv_tax_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('pucc_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('permit_valid_upto_date', [$startDate, $endDate]);
	            })
	          ->Where('vehicledetails.deleted_at',null)
	          ->chunk(1, function($users) use ($startDate,$endDate,$instance_id,$access_token,&$message) {
	            foreach ($users as $user) {

	            $message = common_whatsapp_message($user->vehicle_number);

	            if($user->expiry_date >= $startDate && $user->expiry_date <= $endDate)
	            {
	                $message .= 'रजिस्ट्रेशन '.Carbon::createFromFormat('Y-m-d', $user->expiry_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            if($user->insurance_expiry_date >= $startDate && $user->insurance_expiry_date <= $endDate)
	            {
	                $message .= 'इंश्योरेंस / बीमा '.Carbon::createFromFormat('Y-m-d', $user->insurance_expiry_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            if($user->fitness_expiry_date >= $startDate && $user->fitness_expiry_date <= $endDate)
	            {
	                $message .= 'फिटनेस '.Carbon::createFromFormat('Y-m-d', $user->fitness_expiry_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            if($user->mv_tax_expiry_date >= $startDate && $user->mv_tax_expiry_date <= $endDate)
	            {
	                $message .= 'रोड टैक्स '.Carbon::createFromFormat('Y-m-d', $user->mv_tax_expiry_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            if($user->pucc_expiry_date >= $startDate && $user->pucc_expiry_date <= $endDate)
	            {
	                $message .= 'प्रदूषण '.Carbon::createFromFormat('Y-m-d', $user->pucc_expiry_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            if($user->permit_valid_upto_date >= $startDate && $user->permit_valid_upto_date <= $endDate)
	            {
	                $message .= 'परमिट '.Carbon::createFromFormat('Y-m-d', $user->permit_valid_upto_date)->format('d/m/Y').' को समाप्त हो रहा है|'."\n";
	            }
	            $mobile = '91'.$user->customer_mobile;
	            $message = urlencode($message);
	            post_whatsapp_curl($mobile,$message,$instance_id,$access_token);
	            $message = '';
	         }
	        });
	         // dd(\DB::getQueryLog());
	}
	catch (Exception $e)
	{
	    Log::error($e);
	}
}

function whatsapp_message_expired($startDate, $endDate){

	try
	{
		$instance_id = config('constants.whatsapp_credentials.instance_id');
		$access_token = config('constants.whatsapp_credentials.access_token');

	    \DB::enableQueryLog();
	    $vehicledetail = vehicledetail::Where(function ($query) use ($startDate,$endDate) {
	              $query->whereBetween('expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('insurance_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('fitness_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('mv_tax_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('pucc_expiry_date', [$startDate, $endDate]);
	              $query->orWhereBetween('permit_valid_upto_date', [$startDate, $endDate]);
	            })
	          ->Where('vehicledetails.deleted_at',null)
	          ->chunk(1, function($users) use ($startDate,$endDate,$instance_id,$access_token,&$message) {
	            foreach ($users as $user) {

	            $message = common_whatsapp_message($user->vehicle_number);

	            if($user->expiry_date >= $startDate && $user->expiry_date <= $endDate)
	            {
	                $message .= 'रजिस्ट्रेशन '.Carbon::createFromFormat('Y-m-d', $user->expiry_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            if($user->insurance_expiry_date >= $startDate && $user->insurance_expiry_date <= $endDate)
	            {
	                $message .= 'इंश्योरेंस / बीमा '.Carbon::createFromFormat('Y-m-d', $user->insurance_expiry_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            if($user->fitness_expiry_date >= $startDate && $user->fitness_expiry_date <= $endDate)
	            {
	                $message .= 'फिटनेस '.Carbon::createFromFormat('Y-m-d', $user->fitness_expiry_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            if($user->mv_tax_expiry_date >= $startDate && $user->mv_tax_expiry_date <= $endDate)
	            {
	                $message .= 'रोड टैक्स '.Carbon::createFromFormat('Y-m-d', $user->mv_tax_expiry_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            if($user->pucc_expiry_date >= $startDate && $user->pucc_expiry_date <= $endDate)
	            {
	                $message .= 'प्रदूषण '.Carbon::createFromFormat('Y-m-d', $user->pucc_expiry_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            if($user->permit_valid_upto_date >= $startDate && $user->permit_valid_upto_date <= $endDate)
	            {
	                $message .= 'परमिट '.Carbon::createFromFormat('Y-m-d', $user->permit_valid_upto_date)->format('d/m/Y').' को समाप्त हो गया है|'."\n";
	            }
	            $mobile = '91'.$user->customer_mobile;
	            $message = urlencode($message);
	            post_whatsapp_curl($mobile,$message,$instance_id,$access_token);
	            $message = '';
	         }
	        });
	         // dd(\DB::getQueryLog());
	}
	catch (Exception $e)
	{
	    Log::error($e);
	}
}

function post_whatsapp_curl($mobile,$message,$instance_id,$access_token){
	$curl = curl_init();
	$url = "https://gowhatap.com/api/send.php?number=".$mobile."&type=text&message=".$message."&instance_id=".$instance_id."&access_token=".$access_token;
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,// your preferred url
        CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
      print_r(json_decode($response));
    }
}

function common_whatsapp_message($vehicle_number){
	$message = 'प्रिय वाहन उपभोक्ता,'."\n";
    $message .= 'दुर्गा इंश्योरेंस सॉल्यूशन अब व्हाट्सएप्प पर भी आपकी सेवा में उपलब्ध है।'."\n";
    $message .= 'अब आप किसी भी समय एक क्लिक पर अपने वाहन की जानकारी प्राप्त कर सकते हैं।'."\n";
    $message .= 'जो हमारे यहां गाड़ी का बीमा बनवाए हैं | वाहन संबंधित पेपर क्या समाप्त हो रहा है वाहन से सम्बंधित समस्या हेतु 9838419090 कॉल भी कर सकते हैं।'."\n";
    $message .= 'हमारी वेबसाइट https://durgainsurance.in पर आप गाड़ी नंबर इंटर करके सर्च करें और जानकारी प्राप्त करें।'."\n\n";
    $message .= 'आपकी गाड़ी नंबर '.$vehicle_number.' का '."\n\n";

    return $message;
}

?>