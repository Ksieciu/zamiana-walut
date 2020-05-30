<?php

namespace App\Http\Controllers;
use json_decode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class currencyController extends Controller
{

    function exchange(){
        $url = "https://api.nbp.pl/api/exchangerates/rates/A/%s?format=json";
        $codes = ["EUR" => 0, "USD" => 0, "CHF" => 0];

        foreach($codes as $code => $value){
            $curr_url = sprintf($url, $code);
            $codes[$code] = json_decode(Http::get($curr_url));
            $codes[$code] = $codes[$code]->rates[0]->mid;
        }

        return view('currency', ['codes' => $codes]);
    }
}
