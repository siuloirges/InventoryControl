<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReports extends Model
{
    use HasFactory;
    protected $table = "payment_reports";

    //types
    const COMISION = "Comision";
    const SALARIO = "Salario";


    protected $fillable = [
        'employee_commission',
        'mes',
        'url_pdf',
        'type_reports',
        'employee_approval',
        'bonus',
        'reason_bonus',
        'discount',
        'reason_discount',
        'is_finished',
        'stores_id',
        'user_id'
    ];


}
