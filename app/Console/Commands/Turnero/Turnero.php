<?php

namespace App\Console\Commands\Turnero;

use App\Models\CmsSettings;
use App\Models\CmsUser;
use App\Models\Prospectos;
//use App\Models\SmsUsers;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use DateTime;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Support\Facades\DB;

class Turnero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Turnero';

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

//        $siguiente = CmsUser::where('available', '=' , 1)->orderBy('last_assign', 'asc')->where('id_cms_privileges', '=' , CmsUser::AsesorComercial)->orWhere('id_cms_privileges', '=' , CmsUser::Coordinador)->get();
//
//        dd($siguiente);

//       DB::beginTransaction();

        $five_minutes_ago = new DateTime();
        $five_minutes_ago->modify('-5 minute');

        $prospectos = Prospectos::where('user_id', null)->where('created_at','<', $five_minutes_ago)->get();

//        dd($prospectos);
        try {

            foreach ($prospectos as $prospecto) {
                sleep(1);

                // asignacion automatica
                $turnero_estado = CmsSettings::where('name', 'turnero_estado')->first()->content;

                if (!$prospecto->user_id && $turnero_estado == 1) {

                    $turnero_modo = CmsSettings::where('name', 'turnero_modo')->first()->content;

                    if ($turnero_modo == 'lineal') {
                        
                        $siguiente = CmsUser::where('available',1)->where(function ($query) {
                            $query->where('id_cms_privileges', '=' , CmsUser::Coordinador)
                                  ->orWhere('id_cms_privileges', '=' , CmsUser::AsesorComercial);
                        })->orderBy('last_assign', 'asc')->first();

                        $siguiente->last_assign = now();
                        $siguiente->save();



                    } elseif ($turnero_modo == 'carga') {

                        $siguiente = DB::select("SELECT cms_users.id AS id,cms_users.name AS name,ifnull(por_contactar.por_contactar,0) AS por_contactar FROM (cms_users left join (select count(0) AS por_contactar,prospecto.user_id AS user_id from prospecto where prospecto.status = 'Por Contactar' group by prospecto.user_id) por_contactar on(por_contactar.user_id = cms_users.id)) WHERE ( cms_users.id_cms_privileges = 2 or cms_users.id_cms_privileges = 5 )  and cms_users.available = 1 ORDER BY ifnull(por_contactar.por_contactar,0) ASC ;") ;
                        $siguiente = CmsUser::where('id',$siguiente[0]->id  )->first();
                        $siguiente->last_assign = now();
                        $siguiente->save();

                    }
                    $this->info($siguiente->id);
                    $prospecto->user_id = $siguiente->id;

                }

                $prospecto->save();

            }

            \Log::debug('SUCCESS - command:Turnero');
            $this->info("SUCCESS");

        } catch (\Exception $e) {

            $this->info("Catch");

            $this->info($e);
            \Log::debug($e);

        };




        return 0;
    }
}
