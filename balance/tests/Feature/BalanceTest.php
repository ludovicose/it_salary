<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BalanceTest extends TestCase
{
    /**
     * @return void
     */
    public function test_get_current_balance_of_the_user()
    {
        $response = $this->postJson(route('main'), [
            'jsonrpc' => '2.0',
            'method' => 'balance.userBalance',
            'params' => [
                'user_id' => 10
            ],
            'id' => 2
        ]);

        $response->dump()->assertStatus(200);
    }
}
