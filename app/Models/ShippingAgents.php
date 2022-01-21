<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class ShippingAgents extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "shipping_agents";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const ENVIA = "ENVIA";
    const SERVIENTREGA = "SERVIENTREGA";
    const ENTREGA_FISICA = "Entrega Fisica";
    const DHL_INTERNATIONAL = "DHL - International";

    protected $fillable = [
        'name'
    ];
}
