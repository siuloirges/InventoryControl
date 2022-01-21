<?php

namespace App\UseCase\Prospecto;

use App\DataTransferObjects\Prospecto\ProspectoDTO;
use App\UseCase\Prospecto\Contracts\ConvertToCustomerInterface;


class ConvertToCustomerUseCase implements ConvertToCustomerInterface
{
    /**
     * @var ConvertToCustomerInterface
     */
    private $repositoryG;

    /**
     *
     * @param ConvertToCustomerInterface $repository
     */
    public function __construct(
        ConvertToCustomerInterface $repository
    )
    {
        $this->repositoryG = $repository;
    }



    /**
     * @param ProspectoDTO $prospectoDTO
     * @return array
     */

    public function convert( ProspectoDTO $prospectoDTO ):array
    {
      return ["data"=>"succes"];
    }
}
