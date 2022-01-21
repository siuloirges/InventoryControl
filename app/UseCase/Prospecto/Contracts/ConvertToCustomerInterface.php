<?php

namespace App\UseCase\Prospecto\Contracts;

use App\DataTransferObjects\Prospecto\ProspectoDTO;

interface ConvertToCustomerInterface
{

    /**
     * @param ProspectoDTO $prospectoDTO
     * @return array
     */

    public function convert( ProspectoDTO $prospectoDTO ):array;

}
