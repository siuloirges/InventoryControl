<?php


namespace App\Repositories\OnlinePaymentStatus\Contracts;


interface OnlinePaymentStatusInterface
{

    public function  getNameByCode(string $code):string;

    public function  getCodeByEpaycoCode( string $code):string;

}
