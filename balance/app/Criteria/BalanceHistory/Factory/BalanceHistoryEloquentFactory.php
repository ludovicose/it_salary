<?php
declare(strict_types=1);

namespace App\Criteria\BalanceHistory\Factory;

use App\Contract\BalanceHistoryCriteriaFactory;
use App\Contract\Criteria;
use App\Criteria\Eloquent\BalanceHistory\BalanceHistoryCriteria;
use App\DTO\BaseDTO;

final class BalanceHistoryEloquentFactory implements BalanceHistoryCriteriaFactory
{
    public function make(BaseDTO $DTO): Criteria
    {
        return new BalanceHistoryCriteria($DTO);
    }
}
