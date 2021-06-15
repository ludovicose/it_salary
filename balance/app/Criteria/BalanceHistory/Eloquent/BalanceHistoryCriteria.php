<?php
declare(strict_types=1);

namespace App\Criteria\Eloquent\BalanceHistory;

use App\Criteria\Eloquent\Criteria;
use App\DTO\BaseDTO;

final class BalanceHistoryCriteria extends Criteria
{
    /**
     * @var string[]
     */
    protected $filters = ['id', 'balance', 'value'];

    /**
     * @var array
     */
    protected $data;

    /**
     * CategoryCriteria constructor.
     * @param $data
     */
    public function __construct(BaseDTO $data)
    {
        $this->data = $data->toArray();
    }

    /**
     * @param string|null $type
     * @return mixed
     */
    protected function id(?string $type = null)
    {
        return $this->builder->where('id', $type);
    }

    /**
     * @param string|null $type
     * @return mixed
     */
    protected function value(?string $type = null)
    {
        return $this->builder->where('value', $type);
    }

    /**
     * @param string|null $type
     * @return mixed
     */
    protected function balance(?string $type = null)
    {
        return $this->builder->where('balance', $type);
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->data['limit'];
    }
}
