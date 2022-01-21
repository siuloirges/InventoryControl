<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "status_detail_order";

    protected $fillable = [
        "order_id",
        "status",
        "description"
    ];
}
