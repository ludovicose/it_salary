<?php
declare(strict_types=1);

namespace App\Service;

use App\Contract\BalanceHistoryRepository;
use App\DTO\UserBalanceHistoryDTO;
use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class BalanceHistoryService implements \App\Contract\BalanceHistoryService
{
    /**
     * @var BalanceHistoryRepository
     */
    private $balanceHistoryRepository;

    /**
     * BalanceHistoryService constructor.
     * @param BalanceHistoryRepository $balanceHistoryRepository
     */
    public function __construct(BalanceHistoryRepository $balanceHistoryRepository)
    {
        $this->balanceHistoryRepository = $balanceHistoryRepository;
    }

    public function getCurrentBalance(int $userId): BalanceHistory
    {
        return $this->balanceHistoryRepository->getBalanceByUserId($userId);
    }

    public function getHistories(UserBalanceHistoryDTO $historyDTO): LengthAwarePaginator
    {
        return $this->balanceHistoryRepository->getHistoriesByUser($historyDTO->userId, $historyDTO->page, $historyDTO->limit);
    }
}
