<?php


namespace App\Repositories\OnlinePaymentStatus;


use App\Models\OnelinePaymentStatus;
use App\Models\paymentGatewayAgent;
use App\Repositories\OnlinePaymentStatus\Contracts\OnlinePaymentStatusInterface;

class OnlinePaymentStatusRepository implements OnlinePaymentStatusInterface
{
    public function getNameByCode($code):string {
        return OnelinePaymentStatus::where('identifier_code',$code)->first()->name;
    }

    public function getCodeByEpaycoCode($codeEpayco):string {

        if($codeEpayco == paymentGatewayAgent::RECHAZADA){
          return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_RECHAZADA;
        }

        if($codeEpayco == paymentGatewayAgent::CANCELADA){
          return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_CANCELADA;
        }

        if($codeEpayco == paymentGatewayAgent::ABANDONADA){
          return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_ABANDONADA;
        }

        if($codeEpayco == paymentGatewayAgent::FALLIDA){
          return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_FALLIDA;
        }

        if($codeEpayco == paymentGatewayAgent::ACEPTADA){
            return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_PAGADO;
        }


        if($codeEpayco == paymentGatewayAgent::PENDIENTE){
            return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_PAGO_PENDIENTE;
        }

        if($codeEpayco == paymentGatewayAgent::APROBADA){
            return  OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_OTRO;
        }
    }
}
