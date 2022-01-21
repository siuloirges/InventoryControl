<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Jenssegers\Database\Relations\HasMany;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "products";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //TYPES OF PRODUCTS
    const PRODUCT = "PRODUCT";
    const KIT = "KIT";

    protected $fillable = [
        'id',
        'picture',
        'name',
        'price',
        'type',
        'minimum_ammount',
        'categories_id',
        'stores_id',
        'expiration_date',
        'barcode',
        'description',
        'is_public',
        'commission_sale',
        'public_description',
        'commercial_sale_price'
    ];

    public function detailKit(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(productKitDetail::class, "products_kit_id")->where('products_id', '!=', null);
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function recursosInfo(): HasMany
    {
        return $this->hasMany(Recursos::class, "products_id")->where('type', Recursos::INFORMACION_TYPE);
    }

    public function recursosQuestion(): HasMany
    {
        return $this->hasMany(Recursos::class, "products_id")->where('type', Recursos::PREGUNTA_TYPE);
    }
}
