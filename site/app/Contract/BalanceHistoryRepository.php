<?php

namespace App\Contract;

use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BalanceHistoryRepository
{
    public function getBalanceByUserId(int $userId): ?BalanceHistory;

    public function getHistoriesByUser(int $userId, int $page = 1, int $limit = 20): LengthAwarePaginator;
}
