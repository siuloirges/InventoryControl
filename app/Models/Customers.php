<?php

namespace App\Models;

use Database\Factories\CustomersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "customers";
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'stores_id',
         'name',
         'last_name',
         'address',
         'phone',
         'phone_other',
         'email',
         'identification_number',
         'description',
         'user_id',
         'municipality_id',
         'department_id',
         'type_document_id',

      ];

      protected static function newFactory():CustomersFactory
      {
          return CustomersFactory::new();
      }
    protected static function boot() {
        parent::boot();

        self::updating(function($user) {

            if($user->isDirty('name')) {
                \Log::debug("[ !!CAMBIO!!] - ");
            }
        });
    }
}
