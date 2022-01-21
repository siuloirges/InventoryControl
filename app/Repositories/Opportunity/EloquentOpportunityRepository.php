<?php

namespace App\Repositories\Opportunity;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\Repositories\Opportunity\Contracts\EloquentOpportunityRepositoryInterface;


class EloquentOpportunityRepository implements EloquentOpportunityRepositoryInterface
{

    /**
     * @param GetOrderRequestDTO $orderRequestDTO
     * @return bool
     */
    public function save(GetOrderRequestDTO $orderRequestDTO): bool
    {
        return true;
    }
}
