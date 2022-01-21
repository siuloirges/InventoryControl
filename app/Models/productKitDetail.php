<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productKitDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "product_kit_detail";

    protected $fillable = [
        "products_kit_id",
        "products_id",
        "quantity"
    ];
}
