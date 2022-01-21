<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentGatewayAgent extends Model
{
    use HasFactory;

    protected $table = "payment_gateway_agent";
    //payment_gateway_agent
    CONST EPYCO_IDENTIFIER_CODE = "A1001";

   //ESTADOS EPYCO
    CONST PENDIENTE = "Pendiente";
    CONST FALLIDA = "Fallida";
    CONST RECHAZADA = "Rechazada";
    CONST ACEPTADA = "Aceptada";
    CONST APROBADA = "Aprobada";
    CONST CANCELADA = "Cancelada";
    CONST ABANDONADA = "Abandonada";

    protected $fillable = [
        'name',
        'agent_identifier_code'
    ];

    public function scopeGetpaymentGatewayAgentByCode($code)
    {
        return paymentGatewayAgent::where('agent_identifier_code',$code)->first();
    }


}
