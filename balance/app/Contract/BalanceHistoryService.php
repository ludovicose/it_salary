<?php

namespace App\Contract;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

interface BalanceHistoryService
{
    public function userBalance(int $userId): BalanceHistory;

    public function history(int $userId): Collection;
}
