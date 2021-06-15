<?php

namespace App\Http\Controllers;

use App\Contract\BalanceController as BalanceControllerContract;
use App\Contract\BalanceHistoryService;
use App\Http\Requests\ShowBalanceHistoryRequest;
use App\Http\Requests\ShowCurrentBalanceRequest;
use App\Http\Resources\BalanceHistoriesResource;
use App\Http\Resources\BalanceHistoryResource;

class BalanceController extends Controller implements BalanceControllerContract
{
    /**
     * @var BalanceHistoryService
     */
    private $balanceHistoryService;

    /**
     * BalanceController constructor.
     * @param BalanceHistoryService $balanceHistoryService
     */
    public function __construct(BalanceHistoryService $balanceHistoryService)
    {
        $this->balanceHistoryService = $balanceHistoryService;
    }

    public function userBalance(ShowCurrentBalanceRequest $request)
    {
        return new BalanceHistoryResource(
            $this->balanceHistoryService->getCurrentBalance($request->getDTO())
        );
    }

    public function history(ShowBalanceHistoryRequest $request)
    {
        return new BalanceHistoriesResource(
            $this->balanceHistoryService->getHistories($request->getDTO())
        );
    }
}
