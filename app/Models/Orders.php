<?php

namespace App\Models;

use Database\Factories\OrdersFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use DateTime;

/**
 * @method static where(string $string, int $orderID)
 */
class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "orders";

    //Estados de online_payment_status
//    const ONELINE_PAYMENT_STATUS_POR_DEFINIR = "Por definir";
//    const ONELINE_PAYMENT_STATUS_NO_PAGADO = "No pagado";
//    const ONELINE_PAYMENT_STATUS_PAGADO = "Pagado";
//    const ONELINE_PAYMENT_STATUS_PAGO_PENDIENTE = "Pago pendiente";
//    const ONELINE_PAYMENT_STATUS_MULTIPLES_INTENTOS = "Multiples intentos";

    //IVA
    const IVA_FOR_CALCULATE = 1.19;
    const IVA_PERCENTAGE = 0.19;

    //statuses
    const EN_VALIDACION = "EN VALIDACION";
    const ALISTAMIENTO  = "ALISTAMIENTO";
    const GUIA_GENERADA = "GUIA GENERADA";
    const EN_REPARTO    = "EN REPARTO";
    const ENTREGADO     = "ENTREGADO";
    const INCOMPLETO    = "INCOMPLETO";
    const PENDIENTE     = "PENDIENTE";
    const RESERVADA     = "RESERVADA";
    const EN_NOVEDAD    = "EN NOVEDAD";
    const CANCELADA     = "CANCELADA";

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'id',
         'user_id',
         'stores_id',
         'customers_id',
         'shipping_agent_id',
         'payment_methods',
         'is_reserved',
         'shipping_agent_status',
         'order_number',
         'status',
         'total',
         'tax',
         'is_tax',
         'discount',
         'grand_total',
         'adress',
         'municipality_id',
         'department_id',
         'who_receives',
         'receives_identification_number',
         'guide_number',
         'Description',
         'payment_gateway_agent_id',
         'online_payment_status',
         'payment_gateway_agent_status',
         'commission',
         'created_at',
         'delivery_date_time'
      ];

      protected static function newFactory():OrdersFactory
      {
          return OrdersFactory::new();
      }


    public function scopeGetIva()
    {
        return intval (str_replace("0.", "", CmsSettings::where('name', 'iva')->first()->content) );
    }

    public function scopeGetIvaForCalculate()
    {
     $num = intval (str_replace( "0.", "", CmsSettings::where('name', 'iva')->first()->content));
     return doubleval ( "1.".$num );
    }

    public function scopeGetLastOrderNumber()
    {
      return  LastOrderNumber::orderBy('created_at', 'desc')->first()->order_number;
    }

    public function scopeReserveOrderNumber()
    {

        $lastNumber = LastOrderNumber::orderBy('created_at', 'desc')->first()->order_number;
        $LastOrderNumber =  new LastOrderNumber();
        $LastOrderNumber->order_number = $lastNumber+1;
        $LastOrderNumber->save();

        return $LastOrderNumber->order_number;

    }

    public function scopeLastMonth($query)
    {
        $primer_dia_mes = (new DateTime())->modify('first day of this month')->format('Y-m-d');
        $ultimo_dia_mes = (new DateTime())->modify('last day of this month')->format('Y-m-d');

        $query->whereBetween('orders.delivery_date_time', [$primer_dia_mes, $ultimo_dia_mes]);

    }







}


