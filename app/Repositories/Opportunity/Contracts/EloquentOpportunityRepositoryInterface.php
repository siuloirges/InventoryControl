<?php

namespace App\Repositories\Opportunity\Contracts;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;

interface EloquentOpportunityRepositoryInterface
{
    /**
     * @param GetOrderRequestDTO $orderRequestDTO
     * @return bool
     */
    public function save(GetOrderRequestDTO $orderRequestDTO):bool;
}
