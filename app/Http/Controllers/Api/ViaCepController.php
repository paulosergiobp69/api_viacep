<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViaCepController extends Controller
{

    public function index(){
        dd('teste de rotas');
    }
    //
    public function getCep($cep){
        //  forma antiga
        /*
       $curl = curl_init();


        curl_setopt_array($curl, [
            CURLOPT_URL => "https://viacep.com.br/ws/$cep/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

    
        $response = curl_exec($curl);

        curl_close($curl);
        $array = json_decode($response, true);

        // retorno
        return  isset($array['cep']) ? $array  : null;
        */
       // atual
       return HTTP::get("https://viacep.com.br/ws/$cep/json/")->json();

    }

}
