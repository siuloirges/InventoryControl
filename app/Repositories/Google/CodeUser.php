<?php


namespace App\Repositories\Google;

use App\Models\CmsUser;

class CodeUser
{

    public function  varifyExistingCode( string $string ): array
    {

        $exist = false;
        $CodeExist = '';
        $users = CmsUser::select('code','id','name')->get();

        foreach ( $users as $item )
        {

          $code = $item->code!=null?$item->code:$this->generateCodeByName($item->name);

          if( str_contains($string,$code) ){
              $exist = true;
              $CodeExist = $code;
              return [ 'exist'=>$exist, 'CodeExist'=> trim($CodeExist)];
          }

        }

        return [ 'exist'=>$exist, 'CodeExist'=> $CodeExist];

    }

    public function  varifyExistingCodeByListCode( string $string, $users): array
    {

        $exist = false;
        $CodeExist = '';

        foreach ( $users as $item )
        {
          if( str_contains($string, $item->code) || str_contains( $string,$this->generateCodeByName($item->name)) ){
              $exist = true;
              $CodeExist = $item->code;
          }
        }

        return [ 'exist'=>$exist, 'CodeExist'=>  trim($CodeExist)];

    }


    public function getCodeByID( $id )
    {

        $user = CmsUser::where('id',$id)->first();

        if($user->code != null){
            return  trim($user->code);
        }

        if($user->code == null){

           return  trim($this->generateCodeByName($user->name));

        }

        return '';

    }

     private function generateCodeByName(string  $name):string {
        $name = explode(' ', $name);
        $codeName = '';
        foreach ($name as $item ){ $codeName .= substr($item, 0, 1); }
        return $codeName.'1';
   }

}
