<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnelinePaymentStatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "online_payment_status";

    //Estados de online_payment_status
    const ONELINE_PAYMENT_STATUS_POR_DEFINIR = "A1";
    const ONELINE_PAYMENT_STATUS_NO_PAGADO = "A2";
    const ONELINE_PAYMENT_STATUS_PAGADO = "A3";
    const ONELINE_PAYMENT_STATUS_PAGO_PENDIENTE = "A4";
    const ONELINE_PAYMENT_STATUS_MULTIPLES_INTENTOS = "A5";
    const ONELINE_PAYMENT_STATUS_FALLIDA = "A6";
    const ONELINE_PAYMENT_STATUS_RECHAZADA = "A7";
    const ONELINE_PAYMENT_STATUS_ACEPTADA = "A8";
    const ONELINE_PAYMENT_STATUS_APROBADA = "A9";
    const ONELINE_PAYMENT_STATUS_ABANDONADA = "A10";
    const ONELINE_PAYMENT_STATUS_CANCELADA = "B1";
    const ONELINE_PAYMENT_STATUS_OTRO = "Z10";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'identifier_code'
    ];

}
