<?php

namespace Database\Factories;

use App\Models\BalanceHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalanceHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BalanceHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomFloat(2, 0, 6),
            'balance' => $this->faker->randomFloat(2, 0, 6),
            'user_id' => User::factory()->create(),
        ];
    }
}
