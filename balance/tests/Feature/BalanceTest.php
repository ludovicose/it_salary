<?php

namespace Tests\Feature;

use App\Models\BalanceHistory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BalanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_get_current_balance_of_the_user()
    {
        $user = User::factory()->create();

        BalanceHistory::factory()
            ->count(50)
            ->create(['user_id' => $user->id]);

        $response = $this->postJson(route('main'), [
            'jsonrpc' => '2.0',
            'method' => 'balance.userBalance',
            'params' => [
                'limit' => 50,
                'user_id' => $user->id,
            ],
            'id' => 2
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'user_id' => $user->id
            ])
            ->assertJsonStructure([
                'id',
                'user_id',
            ]);
    }

    public function test_get_user_histories()
    {
        $user = User::factory()->create();

        BalanceHistory::factory()
            ->count(50)
            ->create(['user_id' => $user->id]);

        $response = $this->postJson(route('main'), [
            'jsonrpc' => '2.0',
            'method' => 'balance.history',
            'params' => [
                'limit' => 50,
                'user_id' => $user->id,
            ],
            'id' => 2
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'jsonrpc' => '2.0',
                'result' => [
                    [
                        'user_id' => $user->id
                    ],
                ]
            ])
            ->assertJsonStructure([
                'jsonrpc',
                'result' => [
                    ['id', 'user_id'],
                ],
                'pagination' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages'
                ]
            ]);
    }
}
