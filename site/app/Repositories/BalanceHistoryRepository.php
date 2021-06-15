<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\BalanceHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

final class BalanceHistoryRepository implements \App\Contract\BalanceHistoryRepository
{

    /**
     * BalanceHistoryRepository constructor.
     */
    public function __construct()
    {
        $this->balanceServiceURL = config('services.balance.url');
    }

    public function getBalanceByUserId(int $userId): ?BalanceHistory
    {
        $result = Http::accept('application/json')
            ->post($this->balanceServiceURL, [
                'jsonrpc' => '2.0',
                'method' => 'balance.userBalance',
                'params' => [
                    'user_id' => $userId,
                ],
            ]);

        $collection = $result->collect();

        if ($collection->has('error')) {
            throw new \Exception($collection->get('error')['message']);
        }

        return (new BalanceHistory())->setRawAttributes($result->json());
    }

    public function getHistoriesByUser(int $userId, int $page = 1, int $limit = 20): LengthAwarePaginator
    {
        $result = Http::accept('application/json')
            ->post($this->balanceServiceURL, [
                'jsonrpc' => '2.0',
                'method' => 'balance.history',
                'params' => [
                    'page' => $page,
                    'limit' => $limit,
                    'user_id' => $userId,
                ],
            ]);
        $historyCollection = $result->collect();

        if ($historyCollection->has('error')) {
            throw new \Exception($historyCollection->get('error')['message']);
        }

        $historyCollection = $result->collect();
        $pagination = $historyCollection->get('pagination');
        $histories = collect();

        foreach ($historyCollection->get('result') as $item) {
            $histories->add((new BalanceHistory())->setRawAttributes($item));
        }

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $histories,
            $pagination['total'],
            $pagination['per_page'],
        );
    }
}
