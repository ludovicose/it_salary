<?php

namespace App\Contract;

use App\DTO\UserBalanceDTO;
use App\DTO\UserBalanceHistoryDTO;
use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

interface BalanceHistoryService
{
    public function getCurrentBalance(UserBalanceDTO $balanceDTO): BalanceHistory;

    public function getHistories(UserBalanceHistoryDTO $historyDTO): Collection;
}
