<?php

namespace App\Contract;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

interface BalanceHistoryRepository
{
    public function getBalanceByUserId(int $userId): ?BalanceHistory;

    public function getHistoriesByUserId(int $userId): Collection;
}
