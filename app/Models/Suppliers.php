<?php

namespace App\Models;

use Database\Factories\SuppliersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "suppliers";
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'name',
         'address',
         'phone',
         'phone_other',
         'email',
         'credit'
      ];
  
      protected static function newFactory():SuppliersFactory
      {
          return SuppliersFactory::new();
      }
}
