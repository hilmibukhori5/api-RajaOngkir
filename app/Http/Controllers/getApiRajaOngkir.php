<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class getApiRajaOngkir extends Controller
{
    public function checkout(){
        //mengarah kepada file checkout.blade.php yang ada di view
        return view('checkout');
    }

    public function get_province(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 0df6d5bf733214af6c6644eb8717c92c"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }
    public function get_city(){
    }
}
