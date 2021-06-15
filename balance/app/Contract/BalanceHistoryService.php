<?php

namespace App\Contract;

use App\DTO\UserBalanceDTO;
use App\DTO\UserBalanceHistoryDTO;
use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BalanceHistoryService
{
    public function getCurrentBalance(UserBalanceDTO $balanceDTO): BalanceHistory;

    public function getHistories(UserBalanceHistoryDTO $historyDTO): LengthAwarePaginator;
}
