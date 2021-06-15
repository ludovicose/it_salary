<?php

namespace App\Contract;

use App\DTO\UserBalanceHistoryDTO;
use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BalanceHistoryService
{
    public function getCurrentBalance(int $userId): BalanceHistory;

    public function getHistories(UserBalanceHistoryDTO $historyDTO): LengthAwarePaginator;
}
