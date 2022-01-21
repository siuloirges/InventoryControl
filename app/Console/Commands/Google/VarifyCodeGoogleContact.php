<?php

namespace App\Console\Commands\Google;

use App\Models\CmsUser;
use App\Models\Prospectos;
use App\Repositories\Google\CodeUser;
//use App\Repositories\Google\ContactGoogleRepository;
use App\Repositories\Google\ContactGoogleRepository;
//use App\ValueObject\ContactVO;
use App\ValueObject\ContactVO;
use Illuminate\Console\Command;
use DateTime;
use Illuminate\Support\Facades\DB;

class VarifyCodeGoogleContact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:varifyGoogleContact';

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

        // try {

        //     $usersCodes = CmsUser::select('code','id')->get();

        //     $primer_dia_mes = new DateTime();
        //     $primer_dia_mes->modify('first day of this month');

        //     $ultimo_dia_mes = new DateTime();
        //     $ultimo_dia_mes->modify('last day of this month');

        //     $prospectos = DB::select("SELECT * FROM`prospecto` WHERE  user_id IS NOT NULL AND DATE(updated_at) BETWEEN '".(string)($primer_dia_mes->format('Y-m-d'))."' AND '".(string)($ultimo_dia_mes->format('Y-m-d'))."' OR DATE(created_at) BETWEEN '".(string)($primer_dia_mes->format('Y-m-d'))."' AND '".(string)($ultimo_dia_mes->format('Y-m-d'))."'");



        //     foreach ($prospectos as $prospecto) {

        //    try{
        //        $this->info($this->updateContact($prospecto,$usersCodes)['status']);
        //    }catch (\Exception $e){
        //        $this->info($e);
        //    }

        //     }

        //     \Log::debug('SUCCESS - command:varifyGoogleContact');
        //     $this->info("SUCCESS - command:varifyGoogleContact");

        // }catch (\Exception $e){

        //     $this->info("Error command:varifyGoogleContact: ".$e);
        // }


        return 0;
    }

//     static function updateContact($prospecto,$usersCodes){

// //        $prospecto = Prospectos::findorfail($prospecto->id);
//         $municipalitys = DB::table('municipalitys')->where('id', '=', $prospecto->municipality_id)->first()->name;
//         $departments = DB::table('departments')->where('id', '=', $prospecto->department_id)->first()->name;


//         $names = $prospecto->names;
//         $last_names = $prospecto->last_names;

//         $code = CodeUser::getCodeByID( $prospecto->user_id );


//         if($code){

//             $info = CodeUser::varifyExistingCodeByListCode( $prospecto->names.' '.$prospecto->last_names, $usersCodes);

//             if( $info['exist'] && $info['CodeExist'] != $code ){
//                 $names = str_replace($info['CodeExist'],$code,$names);
//                 $last_names = str_replace($info['CodeExist'],$code,$last_names);
//             }

//             if(! $info['exist'] ){
//                 $names =  $names.' '.$code;
//             }

//         }

//         $contactVO = new ContactVO(

//             $prospecto->id == null?"vacio":$prospecto->id,
//             $names == null?"vacio":$names,
//             $last_names == null?"vacio":$last_names,
//             $prospecto->contact_1 == null?"vacio":$prospecto->contact_1,
//             $prospecto->contact_2 == null?"vacio":$prospecto->contact_2,
//             $prospecto->email_1 == null?"vacio":$prospecto->email_1,
//             $prospecto->email_2 == null?"vacio":$prospecto->email_2,
//             $municipalitys == null?"vacio":$municipalitys,
//             $departments == null?"vacio":$departments,
//             $prospecto->adress == null?"vacio":$prospecto->adress,
//             $prospecto->description == null?"vacio":$prospecto->description

//         );

//         $gooleContctRepository = new ContactGoogleRepository();

//        $data = $gooleContctRepository->saveContact(
//             $contactVO
//        );

//         Prospectos::where('id',$prospecto->id)->update(['names'=>$names,'last_names'=>$last_names]);



//         return $data;
//     }
}
