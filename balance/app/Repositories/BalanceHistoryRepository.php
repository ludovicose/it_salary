<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Contract\Criteria;
use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class BalanceHistoryRepository implements \App\Contract\BalanceHistoryRepository
{
    public function getBalanceByUserId(int $userId): BalanceHistory
    {
        $balance = BalanceHistory::where('user_id', $userId)
            ->latest()
            ->first();

        if (null === $balance) {
            throw new \DomainException('Данный пользователь не найден');
        }

        return $balance;
    }

    public function getHistoriesByUser(int $userId, Criteria $criteria): LengthAwarePaginator
    {
        return BalanceHistory::filter($criteria)
            ->where('user_id', $userId)
            ->paginate($criteria->getLimit());
    }
}
