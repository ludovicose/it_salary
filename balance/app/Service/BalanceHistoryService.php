<?php
declare(strict_types=1);

namespace App\Service;

use App\Contract\BalanceHistoryCriteriaFactory;
use App\Contract\BalanceHistoryRepository;
use App\DTO\UserBalanceDTO;
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

    public function getCurrentBalance(UserBalanceDTO $balanceDTO): BalanceHistory
    {
        return $this->balanceHistoryRepository->getBalanceByUserId($balanceDTO->userId);
    }

    public function getHistories(UserBalanceHistoryDTO $historyDTO): LengthAwarePaginator
    {
        $factory = app()->make(BalanceHistoryCriteriaFactory::class);

        return $this->balanceHistoryRepository->getHistoriesByUser($historyDTO->userId, $factory->make($historyDTO));
    }
}
