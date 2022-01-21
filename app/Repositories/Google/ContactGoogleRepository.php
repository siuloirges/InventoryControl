<?php


namespace App\Repositories\Google;

use App\ValueObject\SimpleContactVO;


class ContactGoogleRepository
{

    static function saveContact( SimpleContactVO $contactVO )
    {

        $json = [

            "names"=>$contactVO->getNames(),
            "contactOne"=>$contactVO->getContactOne(),
            "x-api-key" => "UEzxCMtHFr6na56bKs0W88l4ZH1vbOgu65qihcVy",
            "from" => "JASOCOM"
        ];

        try {

            $opciones = [

                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],

                "json" => $json

            ];

            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://api-stock.tanuncia.net/api/v1/contacts', $opciones);


            if($response->getStatusCode() == 200){
                return ['status' => true];
            }

            return [
                'status' => false,
                'status_code'=>$response->getStatusCode(),
            ];



        } catch (\Exception $e) {

            return [
                'status' => false,
                'data' => $e->getMessage()
            ];
        };
    }


}
