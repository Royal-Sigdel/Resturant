<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class QRController extends Controller
{   
    public function getblade(){
        return view('QrCode.qrcode');
    }
    public function generateQrCode(Request $request)

    {   
        $a = $request->input('amt');
        $client = new \GuzzleHttp\Client();
        $amount = $a;
        $remarks1 = "test1";
        $remarks2 = "test2";
        $prn = Str::random(8);
        $merchantCode = "FALW";
        $secret = 'd3f6648c6ca54eb389d8374ab24c3561';
        //"dataValidation" =>hash_hmac('sha512','amount,prn,merchantCode,remarks1,remarks2','a7e3512f5032480a83137793cb2021dc'),
        //"username" => "sabin",
        //"password" => "kjMPHh(M1vW!ZkI"
        //];
        $string =  $amount. ',' . $prn . ',' . $merchantCode . ',' . $remarks1 . ',' . $remarks2;
        $r = hash_hmac('sha512', $string, $secret);
        
        try{
        $response = $client->request('POST', 'https://merchantapi.fonepay.com/api/merchant/merchantDetailsForThirdParty/thirdPartyDynamicQrDownload', ['json' => [
            "amount" => $amount,
            "remarks1" => $remarks1,
            "remarks2" => $remarks2,
            "prn" => $prn,
            "merchantCode" => $merchantCode,
            "dataValidation" => $r,
            "username" => "9810421559",
            "password" =>  "zbeiletp"]]);
        //$body = $response->getBody();
        
        return $response->getBody();
        }catch (\Exception $e) {
    
            return $e->getMessage();
        }
        //return view('QrCode.qrcode')->with('body',json_decode($body));
        
    }

}
