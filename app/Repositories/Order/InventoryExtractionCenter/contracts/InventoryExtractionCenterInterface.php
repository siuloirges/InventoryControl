<?php


namespace App\Repositories\Order\InventoryExtractionCenter\contracts;


use App\DataTransferObjects\Orders\InventoryExtractionCenterVO;

interface InventoryExtractionCenterInterface
{
    function extractDetails(InventoryExtractionCenterVO $InventoryExtractionCenterVO);
}
