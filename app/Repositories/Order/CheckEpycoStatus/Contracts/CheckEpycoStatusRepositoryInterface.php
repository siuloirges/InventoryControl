<?php


namespace App\Repositories\Order\CheckEpycoStatus\Contracts;

use Illuminate\Support\Collection;

interface CheckEpycoStatusRepositoryInterface
{
    public function checkEpycoStatusByOrderNumber($orderNumber);
}
