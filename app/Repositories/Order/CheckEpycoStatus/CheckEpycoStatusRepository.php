<?php


namespace App\Repositories\Order\CheckEpycoStatus;


use App\Repositories\Order\CheckEpycoStatus\Contracts\CheckEpycoStatusRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use MongoDB\Exception\Exception;

class CheckEpycoStatusRepository implements CheckEpycoStatusRepositoryInterface
{

    public function checkEpycoStatusByOrderNumber($orderNumber)
    {

        try {

            $token = $this->login();

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$token
            ])->post('https://apify.epayco.co/transaction',['filter' => ['referenceClient' => $orderNumber]]);

            $referenses = json_decode($response)->data->data;

//            dd($referenses[0]->status);

            if($referenses == null || $referenses == '[]'){
                return ["status" => true, "statusEspyco" => "", "messague" => "No se encontro pago para esta orden", "code" => 404];
            }

            if (count($referenses) > 1) {

                $statusesEpyco = [];

                foreach ($referenses as $item) {
                    $statusEpyco += $item;
                }

                return ["status" => true, "statusEspyco" => $statusesEpyco, "messague" => "Se encontraron multiples estados", "code" => 207];

            } else if (count($referenses) == 1) {

                return ["status" => true, "statusEspyco" => $referenses[0]->status, "messague" => "Se encontro un pago", "code" => 200];

            } else {
                return ["status" => false, "statusEspyco" => "", "messague" => "No se encontro pago para esta orden", "code" => 404];
            }

        } catch (Exception $e) {
            return ["status" => false, "statusEspyco" => "", "messague" => $e->getMessage(), "code" => 500];

        }

    }

    private function login()
    {
        if(! Session::get('token_epyco') ){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . env('AUTHORIZATION_EPAYCO'),
                'username' => env('USERNAME_EPAYCO'),
                'password' => env('PASSWORD_EPAYCO')

            ])->post('https://apify.epayco.co/login');
            Session::put('token_epyco', json_decode($response->body())->token);
        }

        return Session::get('token_epyco');

    }


}
