<?php


namespace App\Http\services;


use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Paymob
{

    public function credit($price,$invoice_id,$first_name,$last_name,$mobile_phone)
    {
         $token = $this->getToken();
         $order = $this->sendOrder($token,$price,$invoice_id);
         $payment_token = $this->getPaymentToken($token,$order->id,$price,$first_name,$last_name,$mobile_phone);
         Order::create(['order_id'=>$order->id,'invoice_id'=>$invoice_id]);
         return ['url'=>'https://accept.paymob.com/api/acceptance/iframes/351426?payment_token='.$payment_token];
        //return Redirect::away('https://accept.paymob.com/api/acceptance/iframes/351426?payment_token='.$payment_token);

    }

    public function getToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens',[
            'api_key'=>'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SnVZVzFsSWpvaU1UWTBOemsxTkRBek5pNHhNak15TmpJaUxDSndjbTltYVd4bFgzQnJJam94TlRneE5UVXNJbU5zWVhOeklqb2lUV1Z5WTJoaGJuUWlmUS5RSWtlMXBYcFZRaWlwZWI2ZWhlNWVMVFZzNTlyN01oUXF5N1RjMk1HYWkxTUpmOFl5Q2l4d01DVzNya3dGT3VNMmpSQmMxa1N0LVg3ZFRiVGUxdWJMdw=='
        ]);
        $response = json_decode($response);
        return $response->token;
    }

    public function sendOrder($token,$price,$invoice_id)
    {

        $data = [
            'auth_token'=>$token,
            'delivery_needed' => false,
            'amount_cents' => $price,
            'currency' => 'EGP',
            'items' => [],
            ];
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders',$data);
        return json_decode($response);
    }

    public function getPaymentToken($token,$order_id,$price,$first_name,$last_name,$mobile_phone)
    {
        $billing_data = [
            'apartment' => 8212,
            'email' => 'test@test.com',
            'floor'=>"NA",
            'first_name' => $first_name,
            'street' => "NA",
            'building' => "NA",
            'phone_number' => $mobile_phone,
            'shipping_method' => "NA",
            'postal_code' => "NA",
            'city' => "NA",
            'country' =>"NA",
            'last_name' => $last_name,
            'state' => "NA"
        ];

        $data = [
            'auth_token' => $token,
            'amount_cents' => $price,
            'expiration' => 3600,
            'order_id' => $order_id,
            'billing_data' =>$billing_data,
            'currency' => "EGP",
            'integration_id' => 1824730

        ];

        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys',$data);
        $response =  json_decode($response);
        return $response->token;
    }


    public function callback($request)
    {

        $data =  $request->all();
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedSting ='';
        foreach($data as $k=>$v)
        {
            if(in_array($k,$array))
            {
                $connectedSting .= $v;
            }
        }
        $secret = 'BBAD06C8CCDEE901BD3A3EB8860C8AC0';
        $hashed = hash_hmac('sha512',$connectedSting,$secret);
        if($hashed == $hmac)
        {
            return ['process'=>'secret','order_id'=>$data['order'],'price'=>$data['amount_cents']/100];
        }
        return ['process'=>'not_secret'];
    }


}
