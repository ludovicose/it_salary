<?php
declare(strict_types=1);

namespace App\Service;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

final class BalanceHistoryService implements \App\Contract\BalanceHistoryService
{

    public function userBalance(array $data): BalanceHistory
    {
        // TODO: Implement userBalance() method.
    }

    public function history(array $data): Collection
    {
        // TODO: Implement history() method.
    }
}
