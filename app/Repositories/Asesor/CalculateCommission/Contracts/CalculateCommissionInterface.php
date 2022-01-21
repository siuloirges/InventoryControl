<?php


namespace App\Repositories\Asesor\CalculateCommission\Contracts;


interface CalculateCommissionInterface
{
   function calculateCommissionByOrderId($orderId);
}
