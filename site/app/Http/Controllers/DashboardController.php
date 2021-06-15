<?php

namespace App\Http\Controllers;


use App\Contract\BalanceHistoryService;
use App\DTO\UserBalanceHistoryDTO;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var BalanceHistoryService
     */
    private  $historyService;

    /**
     * DashboardController constructor.
     * @param BalanceHistoryService $historyService
     */
    public function __construct(BalanceHistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function index(Request $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $balance = $this->historyService->getCurrentBalance($userId);
        $histories = $this->historyService->getHistories(UserBalanceHistoryDTO::fromRequest($request));

        return view('dashboard', [
            'balance' => $balance,
            'histories' => $histories
        ]);
    }
}
