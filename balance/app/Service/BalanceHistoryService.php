<?php
declare(strict_types=1);

namespace App\Service;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

final class BalanceHistoryService implements \App\Contract\BalanceHistoryService
{

    public function userBalance(int $userId): BalanceHistory
    {
        // TODO: Implement userBalance() method.
    }

    public function history(int $userId): Collection
    {
        // TODO: Implement history() method.
    }
}
