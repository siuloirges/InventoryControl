<?php

namespace App\Repositories\Sirena;

use GuzzleHttp;
use GuzzleHttp\Exception;

class SirenaRepository
{

    static function login()
    {

//        dd( env('SIRENA_REFRESH_TOKEN') );

        try {
            $opciones = [
                'headers' => [
                    'Authorization' => 'Basic ZWFydGg6QEhDOGN7VFEyJU5pW1RwQ1RmNFU0UXVUYyg0',
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                "json" => [
                    "refresh_token" => env('SIRENA_REFRESH_TOKEN'),
                    "grant_type" => "refresh_token",
                    "scope" => "app"
                ]
            ];
            $client = new GuzzleHttp\Client();
            $response = $client->post('https://pluto2.prod.getsirena.com/oauth2/token', $opciones);

            $resp = GuzzleHttp\json_decode($response->getBody(), true);
//            return response()->json([
//                'status' => true,
//                'access_token' => $resp['access_token']
//            ]);

            return [
                'status' => true,
                'access_token' => $resp['access_token']
            ];
        } catch (\Exception $e) {

//            return response()->json([
//                'status' => false,
//                'data' => $e->getMessage()
//            ]);

            return [
                'status'=> false,
                'data'=>$e->getMessage()
            ];
        };
    }

    static function search($crm)
    {


        $access_token = SirenaRepository::login();


        try {

            $opciones = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token['access_token'],
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ];


            $client = new GuzzleHttp\Client();
            $response = $client->get("https://pluto2.prod.getsirena.com/v4/prospects/populated?filters%5Bsearch%5D={$crm['number1']}", $opciones);
            $resp = GuzzleHttp\json_decode($response->getBody(), true);

            if (count($resp['prospectsList'])==0){
//                return response()->json([
//                    'status' => false,
//                    'data' => 'no existe ese prospecto'
//                ],404);

                return [
                    'status'=> false,
                    'data'=>'no existe ese prospecto'
                ];
            }
            $response = $client->get("https://centauri.prod.getsirena.com/prospect/{$resp['prospectsList'][0]['id']}", $opciones);
            $resp = GuzzleHttp\json_decode($response->getBody(), true);

            $event = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token['access_token'],
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' =>  SirenaRepository::event($resp,$crm),
            ];
            // dd(SirenaRepositorios::event($resp,$crm),true);
            $editProspecto = $client->post("https://centauri.prod.getsirena.com/event/prospect", $event);
            $resp = GuzzleHttp\json_decode($editProspecto->getBody(), true);


            return [
                'status'=> true,
                'data'=>'Todo Ok'
            ];
//            return response()->json([
//                'status' => true,
//                // 'events' => SirenaRepositorios::event($resp[count($resp['lastOperations'][0])])//$resp['lastOperations'][0]['_id']
//            ]);

        } catch (\Exception $e) {

            return [
                'status'=> false,
                'data'=> $e->getMessage()
            ];
//            return response()->json([
//                'status' => false,
//                'data' => $e->getMessage()
//            ]);
        };
    }


    static function event($json,$crm)
    {
        try{
            // $numero =count($json['lastOperations']);
            //dd( $json['lastOperations'][$numero]);
            $event = [
                "_id"=> null,
                "account" => env("SIRENA_ACCOUNT"),//$json['lastOperations'][0]['_id'],
                "group" => env('SIRENA_GROUP'),
                "user" => env('SIRENA_USER'),//$json['lastOperations'][0]['user'],
                "operator" => "manager",
                "data" => [
                    "firstName" => $crm['firstName'],//$json['lastOperations'][$numero]['data']['firstName'],// => "Elias 5090S",
                    "lastName" => $crm['lastName'],//['lastOperations'][$numero]['data']['lastName'],//"Barrera",
                    "phones" => [
                        [
                            "dialNumber" => $crm['number1'],//"3145796283",
                            "type" => "personal",
                            "number" => "+57".$crm['number1'],//"+573145796283",
                            "whatsAppCapable"=> true,
                            "originalNumber" => "+57".$crm['number1'],//"573145796283",
                            "mobile" => true
                        ],
                        [
                            "dialNumber" => $crm['number2']?? null,//"3145796283",
                            "type" => "personal",
                            "number" => "+57".$crm['number2']?? null,//"+573145796283",
                            "whatsAppCapable"=> true,
                            "originalNumber" => "+57".$crm['number2']?? null,//"573145796283",
                            "mobile" => true
                        ],

                    ],
                    "emails" => [
                        [
                            "type" => "personal",
                            "address" => $crm['address']
                        ]
                    ],
                    "contacted" => true
                ],
                "internalId" => $json['lastOperations'][0]['internalId'],//"5e9a29cf43150500184cba4c",
                "prospect" => $json['lastOperations'][0]['prospect'],//"5e8f297e3659e7000804b419",
                "status" => "EDITED",
                "type" => "PROSPECT",
                "via" => "APP"
            ];
            return $event;
        }catch(\Throwable $th){
            return $th->getMessage();
        }

    }

    static function create($json)
    {
        try {

            $access_token = SirenaRepository::login();
            $client = new GuzzleHttp\Client();
            $opcionesID = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token['access_token'],
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],

            ];
            $response = $client->get("https://centauri.prod.getsirena.com/prospect/get/futureid", $opcionesID);
            $futureid = GuzzleHttp\json_decode($response->getBody(), true);

            $create = [

                "account" => env("SIRENA_ACCOUNT"),//$json['lastOperations'][0]['account'],//
                "group" => env('SIRENA_GROUP'),//$json['lastOperations'][0]['group'],
                "user" => $json['id'],
                "performer" => [
                    "_id" => env('SIRENA_USER'),
                    "name" => "Elias Barrera",
                    "type" => "manager"
                ],
                "operator" => "manager",
                "platform" => "desktop",
                "createdAt" => "2020-04-17T23:28:46.650Z",
                "data" => [
                    "firstName" => $json['firstName'],
                    "lastName" => $json['lastName'],
                    "phones" => [
                        [
                            "type" => "personal",
                            "number" => $json['number1'],
                            "originalNumber" => null,
                            "mobile" => false
                        ],
                        [
                            "type" => "personal",
                            "number" => $json['number2'],
                            "originalNumber" => null,
                            "mobile" => false
                        ]
                    ],
                    "emails" => [
                        [
                            "type" => "personal",
                            "address" => $json['address']
                        ]
                    ],
                    "contactMediums" => [

                    ],
                    "departamento" =>"departamento",
                    "label" => null,
                    "additionalData" => [
                    ],
                    "interest" => [
                        "source" => [
                            "key" => null,
                            "ref" => null,
                            "props" => [
                                "id" => "common.manualCreation",
                                "values" => [
                                ]
                            ],
                            "_owner" => null
                        ],
                        "comment" => null,
                        "name" => ""
                    ],
                    "contacted" => true,
                    "futureId" => $futureid['id'],
                ],
                "internalId" => "5e9a3bae3baea98d7b017487",
                "status" => "CREATED",
                "type" => "PROSPECT",
                "via" => "APP"
            ];

            //dd($create);

            $opciones = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token['access_token'],
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $create,
            ];

            $response = $client->post("https://centauri.prod.getsirena.com/prospect/new", $opciones);
            $resp = GuzzleHttp\json_decode($response->getBody(), true);

            return response()->json([
                'status' => true,
                'events' => $resp//$resp['lastOperations'][0]['_id']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'data' => $e->getMessage()
            ]);
        };
    }
}
