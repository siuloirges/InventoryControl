<?php


namespace App\Repositories\stock\updateStockMongo\Contracts;


interface UpdateStockMongoInterface
{
    public function updateStock(int $sede);

    public function updateCommersialsPages();

}
