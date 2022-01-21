<?php

namespace App\Models;

use Database\Factories\StoresFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "stores";
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'identification_number',
         'name',
         'adress',
         'phone_number',
         'description',
         'picture'
      ];

      protected static function newFactory():StoresFactory
      {
          return StoresFactory::new();
      }
}
