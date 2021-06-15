<?php

namespace App\Http\Controllers;

use App\Contract\BalanceController as BalanceControllerContract;
use App\Http\Requests\ShowCurrentBalanceRequest;

class BalanceController extends Controller implements BalanceControllerContract
{
    //
    public function userBalance(ShowCurrentBalanceRequest $request)
    {
        return $request;
    }

    public function history(array $data)
    {
        // TODO: Implement history() method.
    }
}
