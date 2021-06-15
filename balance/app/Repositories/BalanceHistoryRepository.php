<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\BalanceHistory;
use Illuminate\Support\Collection;

final class BalanceHistoryRepository implements \App\Contract\BalanceHistoryRepository
{
    public function getBalanceByUserId(int $userId): BalanceHistory
    {
        $balance = BalanceHistory::where('user_id', $userId)->first();

        if (null === $balance) {
            throw new \DomainException('Данный пользователь не найден');
        }

        return $balance;
    }

    public function getHistoriesByUserId(int $userId): Collection
    {
        return BalanceHistory::where('user_id', $userId)->get();
    }
}
