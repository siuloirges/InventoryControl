<?php

namespace App\Models;

use Database\Factories\BrandsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "brands";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name'
      ];

    protected static function newFactory(): BrandsFactory
    {
        return BrandsFactory::new();
    }
}
