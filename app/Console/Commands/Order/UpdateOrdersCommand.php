<?php

namespace App\Console\Commands\Order;

use App\Models\Orders;
use App\Models\ShippingAgents;
use Illuminate\Console\Command;

class UpdateOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateOrders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
         $orders =  Orders::where('status', '!=',Orders::ENTREGADO)
              ->where('status', '!=',Orders::CANCELADA)
              ->where('status', '!=',Orders::EN_NOVEDAD)
              ->where('status', '!=',Orders::PENDIENTE)
              ->where('guide_number', '!=',null)
              ->where('guide_number', '!=','')
              ->get();



         foreach ($orders as $clave => $valor){

             $agent = ShippingAgents::where('id',$valor->shipping_agent_id)->first()->name;
             $guide_number = $valor->guide_number;
             $estado = null;

            if($guide_number){

                switch ($agent) {
                    case ShippingAgents::ENVIA:
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://portal.envia.co/ServicioRestConsultaEstados/Service1Consulta.svc/ConsultaEstadoGuia/'.$guide_number,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_HTTPHEADER => array(
                                'Accept: application/json',
                                'Content-Type: application/json'
                            ),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);

                        $estado = \GuzzleHttp\json_decode($response)->estado;
                        break;
                    case ShippingAgents::SERVIENTREGA:

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://mobile.servientrega.com/Services/ShipmentTracking/api/ControlRastreovalidaciones',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => '{
                             "numeroGuia": '.$guide_number.',
                             "idValidacionUsuario": "0",
                             "tipoDatoValidar": "0",
                             "datoRespuestaUsuario": "0",
                             "lenguaje": "es"
                         }',
                            CURLOPT_HTTPHEADER => array(
                                'Accept: application/json',
                                'Content-Type: application/json'
                            ),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);
                        $estado = \GuzzleHttp\json_decode($response)->Results[0]->estadoActual;
//                     $this->info($estado);
                        break;

                    default:
                        $estado = "Sin estado";

                }


            }
             if($estado){
                 Orders::where('id',$valor->id)->update([
                     'shipping_agent_status'=>$estado
                 ]);
             }

         }

            \Log::debug('SUCCESS - command:updateOrders');
            $this->info("SUCCESS");
        }catch (\Exception $e){
            $this->info("ERROR");
        }



        return 0;
    }
}
