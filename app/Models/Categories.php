<?php

namespace App\Models;

use Database\Factories\CategoriesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "categories";
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         
         'name',
         'Description'
         
      ];
  
      protected static function newFactory():CategoriesFactory
      {
        return CategoriesFactory::new();
      }
}
