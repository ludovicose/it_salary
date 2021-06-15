<?php
declare(strict_types=1);

namespace App\Contract;

use App\DTO\BaseDTO;

interface BalanceHistoryCriteriaFactory
{
    public function make(BaseDTO $DTO): Criteria;
}
