<?php

namespace App\Contract;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

interface BalanceHistoryService
{
    public function userBalance(array $data): BalanceHistory;

    public function history(array $data): Collection;
}
