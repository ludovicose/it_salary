<?php
declare(strict_types=1);

namespace App\Service;

use App\DTO\UserBalanceDTO;
use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

final class BalanceHistoryService implements \App\Contract\BalanceHistoryService
{
    public function getCurrentBalance(UserBalanceDTO $balanceDTO): BalanceHistory
    {
        // TODO: Implement getCurrentBalance() method.
    }

    public function getHistories(int $userId): Collection
    {
        // TODO: Implement getHistories() method.
    }
}
