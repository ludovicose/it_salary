<?php
declare(strict_types=1);

namespace App\Contract;

use App\Http\Requests\ShowCurrentBalanceRequest;

interface BalanceController
{
    public function userBalance(ShowCurrentBalanceRequest $data);

    public function history(array $data);
}
