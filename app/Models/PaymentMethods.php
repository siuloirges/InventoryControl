<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethods extends Model
{
    use SoftDeletes;
    protected $table = "payment_methods";

    //payment_methods
    const COMPRA_ONLINE = "A1";
    const PAGO_CONTRA_ENTREGA = "A2";
    const TRANSFERENCIA = "A3";

    protected $fillable = [
        'name',
        'identifier_code'
    ];

    public function getNamePaymentMethodsByCode($code):string
    {
        return PaymentMethods::where('identifier_code',$code)->first()->name??"";
    }

}
